# Luồng Vận Hành Hệ Thống Elysian Skin Clinic

## 1. LUỒNG BOOKING (Đặt Lịch Hẹn)

### 1.1 Tổng Quan Luồng Booking

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                        LUỒNG BOOKING - SƠ ĐỒ TỔNG QUAN                     │
└─────────────────────────────────────────────────────────────────────────────┘

    ┌──────────────┐     ┌──────────────┐     ┌──────────────┐
    │  STEP 1      │     │  STEP 2      │     │  STEP 3      │
    │  Information │ ──► │  Schedule    │ ──► │  Confirm     │
    │              │     │              │     │              │
    │ • Họ tên     │     │ • Chọn ngày │     │ • Review     │
    │ • SĐT        │     │ • Chọn giờ  │     │ • Confirm    │
    │ • Dịch vụ    │     │              │     │ • Success    │
    │ • Chuyên gia │     │              │     │              │
    └──────────────┘     └──────────────┘     └──────────────┘
           │                    │                    │
           ▼                    ▼                    ▼
    ┌──────────────────────────────────────────────────────────┐
    │                    PHÍA SERVER                            │
    │  • Backend: create_booking.php                            │
    │  • Database: appointments, notifications                  │
    │  • Trạng thái: pending → confirmed → completed/cancelled │
    └──────────────────────────────────────────────────────────┘
```

### 1.2 Chi Tiết Từng Bước

#### **STEP 1: Thông Tin & Chọn Dịch Vụ**

| Trường | Mô tả | Validation |
|--------|-------|------------|
| `full_name` | Họ tên khách hàng | Bắt buộc |
| `phone` | Số điện thoại | 10 số, bắt đầu bằng 0 |
| `service_id` | Dịch vụ mong muốn | Bắt buộc |
| `specialist_id` | Chuyên gia | Bắt buộc |

**API gọi:** `../backend/get_services.php`, `../backend/get_specialists.php`

```
Frontend                          Backend
    │                                  │
    ├─ GET services ──────────────────►│
    │◄── JSON: danh sách dịch vụ ─────┤
    │                                  │
    ├─ GET specialists ───────────────►│
    │◄── JSON: danh sách chuyên gia ──┤
    │                                  │
```

#### **STEP 2: Chọn Ngày & Giờ**

| Trường | Mô tả | Validation |
|--------|-------|------------|
| `appointment_date` | Ngày hẹn | Không được chọn ngày quá khứ |
| `appointment_time` | Giờ hẹn | Slot trống của chuyên gia |

**API gọi:** `../backend/get_slots.php?date=YYYY-MM-DD&service_id=X&specialist_id=Y`

```
Backend kiểm tra:
├── Lịch làm việc của chuyên gia
├── Các booking đã có trong ngày
└── Loại trừ slot bận → Trả về available_slots
```

#### **STEP 3: Xác Nhận & Tạo Booking**

**API gọi:** `../backend/create_booking.php` (POST)

**Dữ liệu gửi lên:**
```json
{
  "full_name": "Nguyễn Văn A",
  "phone": "0912345678",
  "service_id": "5",
  "specialist_id": "3",
  "appointment_date": "2026-05-20",
  "appointment_time": "09:00"
}
```

**Server xử lý:**
```
1. Validate tất cả fields
2. Kiểm tra service tồn tại
3. Kiểm tra specialist tồn tại
4. Kiểm tra slot còn trống (tránh trùng lặp)
5. Tạo booking_code: ELY-XXXXXX
6. INSERT vào bảng appointments (status: pending)
7. Tạo notification cho khách hàng
8. Trả về JSON response
```

### 1.3 Trạng Thái Booking

```
┌─────────────────────────────────────────────────────────────────┐
│                    TRẠNG THÁI APPOINTMENT                       │
└─────────────────────────────────────────────────────────────────┘

    ┌──────────┐     ┌───────────┐     ┌──────────────┐
    │ pending  │────►│ confirmed │────►│   completed  │
    │ (chờ)   │     │ (xác nhận)│     │   (hoàn tất) │
    └──────────┘     └───────────┘     └──────────────┘
           │                │
           │                ▼
           │         ┌──────────────┐
           └────────►│  cancelled   │
                     │   (hủy)      │
                     └──────────────┘
```

| Status | Mô tả | Actor có thể thay đổi |
|--------|-------|----------------------|
| `pending` | Chờ xác nhận từ phòng khám | Receptionist |
| `confirmed` | Đã xác nhận, sẵn sàng | Receptionist |
| `completed` | Đã hoàn thành buổi điều trị | Doctor |
| `cancelled` | Đã hủy | Receptionist, Customer |

### 1.4 Mermaid - Booking Flow

```mermaid
flowchart TD
    A[👤 Khách hàng đăng nhập] --> B{Đã đăng nhập?}
    B -->|Không| G[Chuyển sang signin.php]
    B -->|Có| C[Chọn dịch vụ từ dichvu.php]
    
    C --> D[Click 'Book Now' → booking.php]
    D --> E[STEP 1: Nhập thông tin]
    
    E --> F{Validate OK?}
    F -->|Không| E
    F -->|Có| H[STEP 2: Chọn ngày]
    
    H --> I[Chọn ngày trên Calendar]
    I --> J[Tải available slots]
    J --> K{User chọn giờ?}
    K -->|Chưa| K
    K -->|Có| L[STEP 3: Review]
    
    L --> M[Xác nhận Booking]
    M --> N[POST create_booking.php]
    N --> O{Kiểm tra slot trống?}
    
    O -->|Trùng lặp| P[Thông báo lỗi]
    P --> H
    O -->|OK| Q[Tạo Appointment]
    
    Q --> R[Tạo Notification]
    R --> S[Trả về booking_code]
    S --> T[Hiển thị Modal thành công]
```

### 1.5 Database Schema

```sql
-- Bảng appointments
CREATE TABLE appointments (
    id              INT PRIMARY KEY AUTO_INCREMENT,
    booking_code    VARCHAR(20) UNIQUE,      -- ELY-123456
    user_id         INT,                      -- FK → users (nullable)
    customer_id     INT,                      -- FK → Customer
    customer_name   VARCHAR(255),
    customer_phone  VARCHAR(20),
    service_id      INT,                      -- FK → services
    service_name    VARCHAR(255),
    specialist_id   INT,                      -- FK → specialists
    specialist_name VARCHAR(255),
    appointment_date DATE,
    appointment_time TIME,
    total_price     DECIMAL(10,2),
    status          ENUM('pending','confirmed','completed','cancelled'),
    payment_status  ENUM('unpaid','paid'),
    appointment_type ENUM('booking','treatment') DEFAULT 'booking',
    plan_session_id INT,                      -- NULL nếu booking thường
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Bảng notifications
CREATE TABLE notifications (
    id              INT PRIMARY KEY AUTO_INCREMENT,
    user_id         INT,                      -- NULL nếu là customer
    customer_id     INT,                      -- FK → Customer
    type            VARCHAR(50),
    title           VARCHAR(255),
    message         TEXT,
    priority        ENUM('low','medium','high') DEFAULT 'medium',
    related_type    VARCHAR(50),
    related_id      INT,
    read_at         TIMESTAMP NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 2. LUỒNG TREATMENT PLAN (Kế Hoạch Điều Trị)

### 2.1 Tổng Quan Luồng Treatment Plan

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                   LUỒNG TREATMENT PLAN - SƠ ĐỒ TỔNG QUAN                    │
└─────────────────────────────────────────────────────────────────────────────┘

    ┌──────────────────┐
    │   ADMIN SIDE     │
    │                  │
    │  Doctor tạo Plan │
    │  cho Khách hàng  │
    └────────┬─────────┘
             │
             ▼
    ┌──────────────────┐     ┌──────────────────┐
    │  Create Plan     │     │  Các buổi điều trị │
    │  (create_plan)   │     │  (treatment_plans)│
    │                  │     │                   │
    │ • Tiêu đề       │     │ • Session 1       │
    │ • Chuyên gia    │     │ • Session 2       │
    │ • Mục tiêu      │     │ • Session 3...   │
    │ • Ghi chú lâm sàng│    │ • Up to 6 sessions│
    │ • Lịch trình    │     │                   │
    └────────┬─────────┘     └────────┬─────────┘
             │                        │
             ▼                        ▼
    ┌──────────────────────────────────────────────┐
    │              KẾT QUẢ                          │
    │  1. Tạo treatment_plan                        │
    │  2. Tạo treatment_plan_sessions (tối đa 6)   │
    │  3. Tạo treatment_session_schedules          │
    │  4. Tạo appointments (auto nếu có lịch)      │
    │  5. Tạo notifications (thông báo cho KH)     │
    └──────────────────────────────────────────────┘
```

### 2.2 Chi Tiết Từng Bước

#### **Bước 1: Doctor Tạo Treatment Plan**

**Truy cập:** `admin/create_plan.php?customer_id=X`

**Dữ liệu cần nhập:**

| Trường | Mô tả | Bắt buộc |
|--------|-------|----------|
| `title` | Tiêu đề kế hoạch | ✅ |
| `specialist_id` | Bác sĩ phụ trách | ✅ |
| `start_date` | Ngày bắt đầu | ✅ |
| `overall_goal` | Mục tiêu điều trị | ❌ |
| `clinical_notes` | Ghi chú lâm sàng | ❌ |

#### **Bước 2: Thêm Sessions (Buổi Điều Trị)**

Mỗi plan có tối đa **6 sessions**. Mỗi session gồm:

| Trường | Mô tả |
|--------|-------|
| `service_id` | Dịch vụ cho buổi này |
| `scheduled_date` | Ngày hẹn |
| `scheduled_time` | Giờ hẹn |
| `focus` | Trọng tâm buổi điều trị |
| `before_image` | Hình trước điều trị |
| `after_image` | Hình sau điều trị |

#### **Bước 3: Xác Nhận & Lưu**

**Server xử lý:**
```
1. Kiểm tra customer chưa có active plan
2. BEGIN TRANSACTION
   ├── INSERT treatment_plans
   ├── INSERT treatment_plan_sessions (6 records max)
   ├── INSERT treatment_session_schedules (nếu có lịch)
   ├── INSERT appointments (auto tạo nếu có date/time)
   └── INSERT notifications
3. COMMIT TRANSACTION
```

### 2.3 Mermaid - Treatment Plan Flow

```mermaid
flowchart TD
    A[👨‍⚕️ Doctor đăng nhập] --> B{Tạo Plan mới?}
    
    B -->|Chọn từ danh sách| C[admin/create_plan.php]
    B -->|Từ profile khách| D[admin/customer_detail.php]
    
    C --> E[Nhập thông tin Plan]
    D --> E
    
    E --> F[Chọn Specialist]
    F --> G[Chọn Start Date]
    G --> H[Nhập Goal & Notes]
    H --> I[Thêm Sessions]
    
    I --> J{Session 1-6?}
    J -->|Còn session| K[Nhập thông tin session]
    K --> L{Đã điền lịch?}
    L -->|Có date/time| M[Tạo Appointment auto]
    L -->|Không| N[Bỏ qua]
    M --> J
    N --> J
    
    J -->|Đủ/Stop| O[Submit Form]
    
    O --> P{Validate OK?}
    P -->|Không| E
    P -->|Có| Q[Kiểm tra customer chưa có active plan]
    
    Q -->|Đã có| R[Thông báo lỗi]
    R --> S[Tạo Plan mới]
    Q -->|Chưa có| S
    
    S --> T[BEGIN TRANSACTION]
    T --> U[INSERT treatment_plans]
    U --> V[INSERT treatment_plan_sessions]
    V --> W[INSERT treatment_session_schedules]
    W --> X[INSERT appointments]
    X --> Y[INSERT notifications]
    Y --> Z[COMMIT]
    
    Z --> AA[Tạo notification cho Customer]
    AA --> AB[Redirect → customer_detail.php?tab=plan]
```

### 2.4 Trạng Thái Treatment Plan

```
┌─────────────────────────────────────────────────────────────────┐
│                  TRẠNG THÁI TREATMENT PLAN                      │
└─────────────────────────────────────────────────────────────────┘

    ┌──────────┐     ┌──────────┐
    │  active  │────►│completed │
    │ (đang    │     │ (đã hoàn │
    │  thực hiện)    │  thành)  │
    └────┬─────┘     └──────────┘
         │
         ▼
    ┌──────────┐
    │cancelled │
    │  (hủy)   │
    └──────────┘
```

### 2.5 Database Schema

```sql
-- Bảng treatment_plans
CREATE TABLE treatment_plans (
    id              INT PRIMARY KEY AUTO_INCREMENT,
    customer_id     INT,                      -- FK → Customer
    title           VARCHAR(255),
    specialist_id   INT,                      -- FK → specialists
    overall_goal    TEXT,
    start_date      DATE,
    clinical_notes  TEXT,
    status          ENUM('active','completed','cancelled') DEFAULT 'active',
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Bảng treatment_plan_sessions
CREATE TABLE treatment_plan_sessions (
    id                  INT PRIMARY KEY AUTO_INCREMENT,
    plan_id             INT,                  -- FK → treatment_plans
    session_number      INT,                  -- 1-6
    service_id          INT,                  -- FK → services
    service_name        VARCHAR(255),
    focus_notes         TEXT,
    before_image_path   VARCHAR(255),
    after_image_path    VARCHAR(255),
    completed_at        TIMESTAMP NULL,
    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng treatment_session_schedules
CREATE TABLE treatment_session_schedules (
    id                  INT PRIMARY KEY AUTO_INCREMENT,
    plan_session_id     INT,                  -- FK → treatment_plan_sessions
    scheduled_date      DATE,
    scheduled_time      TIME,
    specialist_id       INT,                  -- FK → specialists
    appointment_id      INT,                  -- FK → appointments
    status              ENUM('scheduled','completed','cancelled') DEFAULT 'scheduled',
    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 2.6 Quan Hệ Giữa Các Bảng

```mermaid
erDiagram
    Customer ||--o{ TreatmentPlan : "có"
    TreatmentPlan ||--|{ TreatmentPlanSession : "bao gồm"
    TreatmentPlanSession ||--o{ TreatmentSessionSchedule : "có lịch"
    TreatmentSessionSchedule ||--o| Appointment : "tạo"
    
    TreatmentPlan }o--|| Specialist : "phụ trách"
    TreatmentPlanSession }o--|| Service : "sử dụng"
    
    TreatmentPlan {
        int id PK
        int customer_id FK
        int specialist_id FK
        varchar title
        text overall_goal
        date start_date
        enum status
    }
    
    TreatmentPlanSession {
        int id PK
        int plan_id FK
        int session_number
        int service_id FK
        varchar service_name
        text focus_notes
        varchar before_image_path
        varchar after_image_path
        timestamp completed_at
    }
    
    TreatmentSessionSchedule {
        int id PK
        int plan_session_id FK
        date scheduled_date
        time scheduled_time
        int specialist_id FK
        int appointment_id FK
        enum status
    }
    
    Appointment {
        int id PK
        varchar booking_code
        int customer_id FK
        int specialist_id FK
        int service_id FK
        date appointment_date
        time appointment_time
        enum status
        enum appointment_type
        int plan_session_id FK
    }
```

---

## 3. SỰ TƯƠNG TÁC GIỮA BOOKING VÀ TREATMENT PLAN

### 3.1 Hai Loại Appointment

```
┌─────────────────────────────────────────────────────────────────┐
│                  HAI LOẠI APPOINTMENT                           │
└─────────────────────────────────────────────────────────────────┘

    ┌─────────────────────────┐     ┌─────────────────────────────┐
    │   TYPE: 'booking'       │     │   TYPE: 'treatment'         │
    │                         │     │                             │
    │   • Khách hàng tự đặt   │     │   • Doctor tạo tự động      │
    │   • Từ frontend/booking │     │   • Từ Treatment Plan       │
    │   • 1 buổi đơn lẻ       │     │   • Là 1 phần của Plan      │
    │   • Status: pending     │     │   • Status: confirmed       │
    │                         │     │   • Có plan_session_id      │
    └─────────────────────────┘     └─────────────────────────────┘
```

### 3.2 Luồng Kết Hợp

```mermaid
flowchart LR
    subgraph Frontend["🦋 FRONTEND - Patient Side"]
        F1[dichvu.php<br/>Dịch vụ]
        F2[booking.php<br/>Đặt lịch]
        F3[profile.php<br/>Xem Plan]
    end
    
    subgraph Admin["🏥 ADMIN - Clinic Side"]
        A1[customers.php<br/>Danh sách KH]
        A2[create_plan.php<br/>Tạo Plan]
        A3[customer_detail.php<br/>Chi tiết KH]
    end
    
    subgraph Database["💾 DATABASE"]
        D1[appointments]
        D2[treatment_plans]
        D3[treatment_plan_sessions]
        D4[notifications]
    end
    
    F1 --> F2
    F2 -->|Type: booking| D1
    D1 --> F3
    F3 -->|Xem| D2
    
    A1 --> A3
    A3 --> A2
    A2 -->|Type: treatment| D1
    D1 --> A3
    D2 --> D3
    
    D1 --> D4
    D2 --> D4
    
    style F2 fill:#e1f5fe
    style A2 fill:#fff3e0
    style D1 fill:#e8f5e9
    style D2 fill:#e8f5e9
```

### 3.3 Notification Flow

```
┌─────────────────────────────────────────────────────────────────┐
│                     LUỒNG THÔNG BÁO                             │
└─────────────────────────────────────────────────────────────────┘

    ┌─────────────┐         ┌─────────────┐
    │   BOOKING   │         │ TREATMENT   │
    │   CREATED   │         │   PLAN      │
    │             │         │   CREATED   │
    └──────┬──────┘         └──────┬──────┘
           │                       │
           ▼                       ▼
    ┌─────────────────────────────────────────┐
    │           NOTIFICATIONS TABLE            │
    │                                         │
    │  • type: 'appointment'                  │
    │  • title: 'Xác nhận đặt lịch'          │
    │  • message: Chi tiết booking            │
    │  • priority: 'high'                    │
    │  • related_type: 'booking'              │
    └─────────────────────────────────────────┘
                      │
                      ▼
             ┌─────────────────┐
             │   Patient Side  │
             │   profile.php   │
             │                 │
             │   Hiển thị      │
             │   notification  │
             │   list          │
             └─────────────────┘
```

---

## 4. BẢNG TỔNG HỢP TRẠNG THÁI

### 4.1 Appointment Status Flow

| Trạng thái | Màu | Mô tả | Ai thay đổi |
|------------|-----|-------|-------------|
| `pending` | 🟡 Vàng | Chờ xác nhận | Receptionist |
| `confirmed` | 🔵 Xanh dương | Đã xác nhận | Receptionist |
| `completed` | 🟢 Xanh | Hoàn thành | Doctor |
| `cancelled` | ⚫ Xám | Đã hủy | Receptionist, Customer |

### 4.2 Treatment Plan Status Flow

| Trạng thái | Màu | Mô tả | Trigger |
|------------|-----|-------|---------|
| `active` | 🔵 Xanh dương | Đang thực hiện | Khi tạo Plan mới |
| `completed` | 🟢 Xanh | Hoàn thành tất cả sessions | Tất cả sessions có `completed_at` |
| `cancelled` | ⚫ Xám | Đã hủy | Doctor hủy Plan |

### 4.3 Session Status Flow

| Trạng thái | Màu | Mô tả |
|------------|-----|-------|
| `scheduled` | 🔵 Xanh dương | Đã lên lịch |
| `completed` | 🟢 Xanh | Đã hoàn thành |
| `cancelled` | ⚫ Xám | Đã hủy |

---

## 5. CÁC API ENDPOINTS

### 5.1 Booking APIs

| Endpoint | Method | Mô tả |
|----------|--------|-------|
| `backend/get_services.php` | GET | Lấy danh sách dịch vụ |
| `backend/get_specialists.php` | GET | Lấy danh sách chuyên gia |
| `backend/get_slots.php` | GET | Lấy slots trống theo ngày |
| `backend/create_booking.php` | POST | Tạo booking mới |
| `backend/get_appointments.php` | GET | Lấy appointments của user |

### 5.2 Treatment Plan APIs

| Endpoint | Method | Mô tả |
|----------|--------|-------|
| `backend/get_treatment_plans.php` | GET | Lấy plans của customer |
| `backend/api/get_completed_plan.php` | GET | Lấy plan đã hoàn thành |

### 5.3 Admin APIs

| Endpoint | Method | Mô tả |
|----------|--------|-------|
| `admin/create_plan.php` | POST | Tạo treatment plan |
| `admin/edit_plan.php` | POST | Sửa treatment plan |
| `admin/cancel_appointment.php` | POST | Hủy appointment |
| `backend/mark_appointment_arrived.php` | POST | Đánh dấu đã đến |

---

## 6. SƠ ĐỒ MERMID TỔNG HỢP

```mermaid
flowchart TB
    subgraph Customer["👤 KHÁCH HÀNG"]
        C1[📱 dichvu.php<br/>Xem dịch vụ]
        C2[📝 booking.php<br/>Đặt lịch]
        C3[👤 profile.php<br/>Xem lịch & Plan]
    end
    
    subgraph Clinic["🏥 PHÒNG KHÁM"]
        D1[📋 appointments<br/>Quản lý lịch hẹn]
        D2[📋 treatment_plans<br/>Quản lý Plan]
        D3[👥 customers<br/>Quản lý KH]
    end
    
    subgraph Doctor["👨‍⚕️ DOCTOR"]
        DOC1[admin/create_plan.php<br/>Tạo Treatment Plan]
        DOC2[admin/customer_detail.php<br/>Xem chi tiết KH]
    end
    
    C1 -->|Click Book| C2
    C2 -->|Validate| API1[backend/create_booking.php]
    API1 -->|Insert| D1
    D1 -->|Tạo| NOTIFY1[Notification<br/>Booking mới]
    NOTIFY1 --> C3
    
    DOC1 -->|Tạo| D2
    D2 -->|Tạo| D1
    D2 -->|Tạo| NOTIFY2[Notification<br/>Plan mới]
    NOTIFY2 --> C3
    
    C3 -->|Xem| D1
    C3 -->|Xem| D2
    C3 -->|Xem| NOTIFY1
    C3 -->|Xem| NOTIFY2
    
    style C1 fill:#e3f2fd
    style C2 fill:#e3f2fd
    style C3 fill:#e3f2fd
    style DOC1 fill:#fff3e0
    style DOC2 fill:#fff3e0
    style D1 fill:#e8f5e9
    style D2 fill:#e8f5e9
```

---

## 7. QUY TRÌNH NGHIỆP VỤ TỪNG BƯỚC

### 7.1 Quy Trình Booking (Khách Hàng)

```
BƯỚC 1: Truy cập trang dịch vụ
   └── Khách hàng xem danh sách dịch vụ tại dichvu.php
   └── Chọn dịch vụ → Click "Book Now"

BƯỚC 2: Nhập thông tin đặt lịch
   └── Họ tên (auto-fill nếu đã đăng nhập)
   └── Số điện thoại (auto-fill nếu đã đăng nhập)
   └── Chọn dịch vụ (pre-selected nếu từ service-detail)
   └── Chọn chuyên gia

BƯỚC 3: Chọn ngày giờ
   └── Xem lịch calendar
   └── Chọn ngày phù hợp
   └── Hệ thống hiển thị slots trống
   └── Chọn giờ mong muốn

BƯỚC 4: Xác nhận
   └── Review thông tin đã chọn
   └── Click "Confirm Booking"
   └── Hệ thống tạo booking + notification
   └── Hiển thị modal thành công + booking_code

BƯỚC 5: Nhận thông báo
   └── Notification được tạo trong database
   └── Khách hàng xem tại profile.php
```

### 7.2 Quy Trình Treatment Plan (Doctor)

```
BƯỚC 1: Tiếp nhận khách hàng
   └── Receptionist tạo thông tin khách hàng
   └── Doctor xem danh sách khách hàng chưa có Plan

BƯỚC 2: Tạo Treatment Plan
   └── Truy cập create_plan.php?customer_id=X
   └── Nhập tiêu đề, chọn bác sĩ phụ trách
   └── Nhập mục tiêu điều trị, ghi chú lâm sàng

BƯỚC 3: Lên lịch các buổi điều trị
   └── Với mỗi session (1-6):
       ├── Chọn dịch vụ cho buổi đó
       ├── Nhập trọng tâm điều trị
       ├── Điền ngày/giờ (tùy chọn)
       └── Upload hình before/after (tùy chọn)

BƯỚC 4: Lưu Plan
   └── Hệ thống tạo:
       ├── Treatment Plan record
       ├── Treatment Plan Sessions (1-6)
       ├── Treatment Session Schedules
       ├── Appointments (auto tạo nếu có lịch)
       └── Notifications cho khách hàng

BƯỚC 5: Khách hàng nhận thông báo
   └── Thông báo kế hoạch mới
   └── Thông báo từng buổi hẹn cụ thể
   └── Khách hàng xem tại profile.php
```

---

## 8. VIDEO/PDF EXPORT

Để xuất tài liệu này ra định dạng khác:

### 8.1 Xuất PDF
```bash
# Sử dụng Pandoc
pandoc LUONG_VAN_HANH.md -o LUONG_VAN_HANH.pdf

# Hoặc sử dụng Markdown PDF extension trong VS Code
# Ctrl+Shift+P → "Markdown PDF: Export (pdf)"
```

### 8.2 Xuất HTML
```bash
pandoc LUONG_VAN_HANH.md -o LUONG_VAN_HANH.html
```

### 8.3 Xem trực tiếp
Mở file `LUONG_VAN_HANH.md` trong Cursor/VS Code với extension hỗ trợ Mermaid
- **Markdown Preview Enhanced**
- **Mermaid Markdown Syntax Highlighting**

---

*Tài liệu được tạo ngày: 14/05/2026*
*Hệ thống: Elysian Skin Clinic - Clinic Management System v4*
