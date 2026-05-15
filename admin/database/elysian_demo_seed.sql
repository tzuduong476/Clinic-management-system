-- =========================================================
-- ELYSIAN SKIN CLINIC - DEMO SEED DATA
-- Purpose: Demo data for appointment, customer, service,
-- treatment plan, session tracking, billing and dashboard.
-- Notes:
-- - Adjust table/column names if your local schema differs.
-- - This file is intended for academic demo and testing.
-- =========================================================

SET FOREIGN_KEY_CHECKS = 0;

-- =========================================================
-- 1. CLEAN DEMO DATA
-- =========================================================

DELETE FROM session_records;
DELETE FROM treatment_plan_sessions;
DELETE FROM treatment_plans;
DELETE FROM appointments;
DELETE FROM services;
DELETE FROM specialists;
DELETE FROM Customer;
DELETE FROM users;

SET FOREIGN_KEY_CHECKS = 1;

-- =========================================================
-- 2. USERS
-- Passwords should be replaced by real password_hash() values
-- if used for actual login testing.
-- =========================================================

INSERT INTO users (id, username, password, role, full_name, email, created_at)
VALUES
(1, 'admin01', '$2y$10$demoAdminHashReplaceLater', 'admin', 'Clinic Administrator', 'admin@elysianclinic.test', NOW()),
(2, 'reception01', '$2y$10$demoReceptionHashReplaceLater', 'receptionist', 'Reception Staff', 'reception@elysianclinic.test', NOW()),
(3, 'doctor01', '$2y$10$demoDoctorHashReplaceLater', 'doctor', 'Dr. An Nguyen', 'doctor.an@elysianclinic.test', NOW()),
(4, 'doctor02', '$2y$10$demoDoctorHashReplaceLater', 'doctor', 'Dr. Minh Tran', 'doctor.minh@elysianclinic.test', NOW());

-- =========================================================
-- 3. SPECIALISTS
-- =========================================================

INSERT INTO specialists (id, name, role, phone, email, is_active, created_at)
VALUES
(1, 'Dr. An Nguyen', 'Dermatology Specialist', '0901000001', 'doctor.an@elysianclinic.test', 1, NOW()),
(2, 'Dr. Minh Tran', 'Skin Therapist', '0901000002', 'doctor.minh@elysianclinic.test', 1, NOW()),
(3, 'Ms. Linh Pham', 'Treatment Technician', '0901000003', 'linh.pham@elysianclinic.test', 1, NOW()),
(4, 'Ms. Ha Le', 'Senior Therapist', '0901000004', 'ha.le@elysianclinic.test', 1, NOW());

-- =========================================================
-- 4. SERVICES
-- =========================================================

INSERT INTO services (id, name, category, price, duration_minutes, description, is_active, created_at)
VALUES
(1, 'Acne Consultation', 'Consultation', 250000, 30, 'Initial skin consultation for acne concern.', 1, NOW()),
(2, 'Deep Cleansing Facial', 'Facial Care', 450000, 60, 'Deep cleansing treatment for clogged pores and oily skin.', 1, NOW()),
(3, 'Acne Treatment Session', 'Treatment', 750000, 75, 'Clinical acne treatment with extraction and calming care.', 1, NOW()),
(4, 'Hydrating Facial', 'Facial Care', 650000, 60, 'Hydration-focused facial for dry and sensitive skin.', 1, NOW()),
(5, 'Brightening Peel', 'Treatment', 950000, 75, 'Mild chemical peel for dullness and post-acne marks.', 1, NOW()),
(6, 'Laser Acne Scar Care', 'Laser Treatment', 1800000, 90, 'Laser-based care for acne scar and uneven skin texture.', 1, NOW()),
(7, 'Skin Barrier Recovery', 'Recovery Care', 700000, 60, 'Treatment for irritated or weakened skin barrier.', 1, NOW()),
(8, 'Anti-aging Facial', 'Facial Care', 900000, 75, 'Firming and rejuvenating facial for early aging signs.', 1, NOW()),
(9, 'Melasma Consultation', 'Consultation', 300000, 30, 'Specialist consultation for pigmentation and melasma.', 1, NOW()),
(10, 'Post-treatment Follow-up', 'Follow-up', 150000, 20, 'Follow-up session after a treatment course.', 1, NOW());

-- =========================================================
-- 5. CUSTOMERS
-- =========================================================

INSERT INTO Customer (Customer_ID, Name, Phone, Email, Gender, DateOfBirth, Address, SkinType, SkinConcern, created_at)
VALUES
(1, 'Nguyen Thu Ha', '0988000001', 'ha.nguyen@example.com', 'Female', '2002-04-12', 'Hanoi', 'Oily', 'Acne and clogged pores', NOW()),
(2, 'Tran Mai Anh', '0988000002', 'maianh.tran@example.com', 'Female', '2001-11-05', 'Hanoi', 'Combination', 'Post-acne marks', NOW()),
(3, 'Le Minh Chau', '0988000003', 'chau.le@example.com', 'Female', '1999-06-20', 'Hanoi', 'Dry', 'Skin barrier damage', NOW()),
(4, 'Pham Quang Huy', '0988000004', 'huy.pham@example.com', 'Male', '2000-09-18', 'Hanoi', 'Oily', 'Inflammatory acne', NOW()),
(5, 'Do Ngoc Linh', '0988000005', 'linh.do@example.com', 'Female', '1998-01-30', 'Hanoi', 'Sensitive', 'Redness and irritation', NOW()),
(6, 'Vu Khanh Ly', '0988000006', 'ly.vu@example.com', 'Female', '2003-07-22', 'Hanoi', 'Combination', 'Uneven skin tone', NOW()),
(7, 'Hoang Bao Tram', '0988000007', 'tram.hoang@example.com', 'Female', '1997-12-14', 'Hanoi', 'Dry', 'Fine lines and dryness', NOW()),
(8, 'Bui Gia Bao', '0988000008', 'bao.bui@example.com', 'Male', '2002-03-03', 'Hanoi', 'Oily', 'Acne scars', NOW()),
(9, 'Dang Phuong Nhi', '0988000009', 'nhi.dang@example.com', 'Female', '2004-10-09', 'Hanoi', 'Normal', 'Preventive skincare', NOW()),
(10, 'Nguyen Thanh Van', '0988000010', 'van.nguyen@example.com', 'Female', '1996-05-27', 'Hanoi', 'Combination', 'Melasma and dullness', NOW()),
(11, 'Tran Minh Duc', '0988000011', 'duc.tran@example.com', 'Male', '1995-08-16', 'Hanoi', 'Oily', 'Large pores', NOW()),
(12, 'Le Khanh An', '0988000012', 'an.le@example.com', 'Female', '2001-02-11', 'Hanoi', 'Sensitive', 'Barrier recovery', NOW());

-- =========================================================
-- 6. APPOINTMENTS
-- payment_status: unpaid / paid / partial
-- status: pending / confirmed / completed / cancelled
-- =========================================================

INSERT INTO appointments
(id, booking_code, customer_id, customer_name, phone, service_id, service_name, specialist_id, specialist_name, appointment_date, appointment_time, status, payment_status, payment_method, total_amount, note, created_at)
VALUES
(1, 'ELY-APT-0001', 1, 'Nguyen Thu Ha', '0988000001', 1, 'Acne Consultation', 1, 'Dr. An Nguyen', '2026-05-15', '09:00:00', 'completed', 'paid', 'cash', 250000, 'First consultation completed.', NOW()),
(2, 'ELY-APT-0002', 1, 'Nguyen Thu Ha', '0988000001', 3, 'Acne Treatment Session', 2, 'Dr. Minh Tran', '2026-05-17', '10:00:00', 'confirmed', 'unpaid', NULL, 750000, 'First treatment session.', NOW()),
(3, 'ELY-APT-0003', 2, 'Tran Mai Anh', '0988000002', 5, 'Brightening Peel', 1, 'Dr. An Nguyen', '2026-05-16', '14:00:00', 'confirmed', 'partial', 'bank_transfer', 950000, 'Customer paid deposit.', NOW()),
(4, 'ELY-APT-0004', 3, 'Le Minh Chau', '0988000003', 7, 'Skin Barrier Recovery', 4, 'Ms. Ha Le', '2026-05-16', '15:30:00', 'pending', 'unpaid', NULL, 700000, 'Sensitive skin, check products carefully.', NOW()),
(5, 'ELY-APT-0005', 4, 'Pham Quang Huy', '0988000004', 3, 'Acne Treatment Session', 3, 'Ms. Linh Pham', '2026-05-18', '09:30:00', 'confirmed', 'paid', 'cash', 750000, 'Repeat acne treatment.', NOW()),
(6, 'ELY-APT-0006', 5, 'Do Ngoc Linh', '0988000005', 4, 'Hydrating Facial', 4, 'Ms. Ha Le', '2026-05-18', '11:00:00', 'confirmed', 'unpaid', NULL, 650000, 'Hydration and calming session.', NOW()),
(7, 'ELY-APT-0007', 6, 'Vu Khanh Ly', '0988000006', 5, 'Brightening Peel', 1, 'Dr. An Nguyen', '2026-05-19', '13:30:00', 'pending', 'unpaid', NULL, 950000, 'Needs consultation before peel.', NOW()),
(8, 'ELY-APT-0008', 7, 'Hoang Bao Tram', '0988000007', 8, 'Anti-aging Facial', 2, 'Dr. Minh Tran', '2026-05-19', '15:00:00', 'confirmed', 'paid', 'bank_transfer', 900000, 'Anti-aging care package.', NOW()),
(9, 'ELY-APT-0009', 8, 'Bui Gia Bao', '0988000008', 6, 'Laser Acne Scar Care', 1, 'Dr. An Nguyen', '2026-05-20', '10:30:00', 'confirmed', 'partial', 'bank_transfer', 1800000, 'Deposit received.', NOW()),
(10, 'ELY-APT-0010', 9, 'Dang Phuong Nhi', '0988000009', 2, 'Deep Cleansing Facial', 3, 'Ms. Linh Pham', '2026-05-20', '16:00:00', 'pending', 'unpaid', NULL, 450000, 'New customer.', NOW()),
(11, 'ELY-APT-0011', 10, 'Nguyen Thanh Van', '0988000010', 9, 'Melasma Consultation', 1, 'Dr. An Nguyen', '2026-05-21', '09:00:00', 'confirmed', 'paid', 'cash', 300000, 'Melasma diagnosis consultation.', NOW()),
(12, 'ELY-APT-0012', 11, 'Tran Minh Duc', '0988000011', 2, 'Deep Cleansing Facial', 4, 'Ms. Ha Le', '2026-05-21', '11:30:00', 'confirmed', 'unpaid', NULL, 450000, 'Large pores and oily skin.', NOW()),
(13, 'ELY-APT-0013', 12, 'Le Khanh An', '0988000012', 7, 'Skin Barrier Recovery', 2, 'Dr. Minh Tran', '2026-05-22', '14:30:00', 'confirmed', 'paid', 'bank_transfer', 700000, 'Barrier repair treatment.', NOW());

-- =========================================================
-- 7. TREATMENT PLANS
-- One active course per customer.
-- Completed courses remain as history.
-- =========================================================

INSERT INTO treatment_plans
(id, customer_id, customer_name, specialist_id, specialist_name, title, goal, skin_concern, status, start_date, expected_end_date, created_at, updated_at)
VALUES
(1, 1, 'Nguyen Thu Ha', 1, 'Dr. An Nguyen', 'Acne Control Course', 'Reduce active acne, calm inflammation, and improve skin routine consistency.', 'Acne and clogged pores', 'active', '2026-05-15', '2026-06-30', NOW(), NOW()),
(2, 2, 'Tran Mai Anh', 1, 'Dr. An Nguyen', 'Post-acne Mark Recovery', 'Improve uneven tone and reduce post-acne marks through controlled brightening care.', 'Post-acne marks', 'active', '2026-05-16', '2026-07-05', NOW(), NOW()),
(3, 3, 'Le Minh Chau', 4, 'Ms. Ha Le', 'Barrier Recovery Course', 'Restore skin barrier and reduce irritation before stronger treatments.', 'Skin barrier damage', 'active', '2026-05-16', '2026-06-20', NOW(), NOW()),
(4, 8, 'Bui Gia Bao', 1, 'Dr. An Nguyen', 'Acne Scar Improvement Course', 'Improve acne scar texture using laser and recovery sessions.', 'Acne scars', 'active', '2026-05-20', '2026-08-20', NOW(), NOW()),
(5, 10, 'Nguyen Thanh Van', 1, 'Dr. An Nguyen', 'Melasma Assessment Course', 'Assess melasma condition and start gentle pigmentation management.', 'Melasma and dullness', 'active', '2026-05-21', '2026-07-10', NOW(), NOW()),
(6, 5, 'Do Ngoc Linh', 4, 'Ms. Ha Le', 'Sensitive Skin Recovery - Completed', 'Reduce redness and stabilize sensitive skin condition.', 'Redness and irritation', 'completed', '2026-03-01', '2026-04-15', NOW(), NOW());

-- =========================================================
-- 8. TREATMENT PLAN SESSIONS
-- completed_at is NULL for future/incomplete sessions.
-- =========================================================

INSERT INTO treatment_plan_sessions
(id, plan_id, session_number, service_id, service_name, focus, planned_date, status, completed_at, session_image_path, created_at, updated_at)
VALUES
-- Plan 1: Nguyen Thu Ha - Acne Control
(1, 1, 1, 1, 'Acne Consultation', 'Initial skin analysis and routine review', '2026-05-15', 'completed', '2026-05-15 10:00:00', NULL, NOW(), NOW()),
(2, 1, 2, 3, 'Acne Treatment Session', 'Extraction, inflammation control and calming mask', '2026-05-22', 'planned', NULL, NULL, NOW(), NOW()),
(3, 1, 3, 3, 'Acne Treatment Session', 'Reduce new breakouts and monitor product response', '2026-05-29', 'planned', NULL, NULL, NOW(), NOW()),
(4, 1, 4, 2, 'Deep Cleansing Facial', 'Oil control and pore cleansing', '2026-06-05', 'planned', NULL, NULL, NOW(), NOW()),
(5, 1, 5, 3, 'Acne Treatment Session', 'Inflammation check and scar prevention', '2026-06-12', 'planned', NULL, NULL, NOW(), NOW()),
(6, 1, 6, 10, 'Post-treatment Follow-up', 'Evaluate course outcome and next recommendation', '2026-06-30', 'planned', NULL, NULL, NOW(), NOW()),

-- Plan 2: Tran Mai Anh - Brightening
(7, 2, 1, 1, 'Acne Consultation', 'Skin assessment before brightening treatment', '2026-05-16', 'completed', '2026-05-16 15:00:00', NULL, NOW(), NOW()),
(8, 2, 2, 5, 'Brightening Peel', 'First mild peel for post-acne marks', '2026-05-23', 'planned', NULL, NULL, NOW(), NOW()),
(9, 2, 3, 4, 'Hydrating Facial', 'Recovery and hydration after peel', '2026-05-30', 'planned', NULL, NULL, NOW(), NOW()),
(10, 2, 4, 5, 'Brightening Peel', 'Second peel if skin response is stable', '2026-06-13', 'planned', NULL, NULL, NOW(), NOW()),
(11, 2, 5, 10, 'Post-treatment Follow-up', 'Evaluate pigmentation improvement', '2026-06-27', 'planned', NULL, NULL, NOW(), NOW()),

-- Plan 3: Le Minh Chau - Barrier Recovery
(12, 3, 1, 7, 'Skin Barrier Recovery', 'Calming treatment and barrier support', '2026-05-16', 'completed', '2026-05-16 16:30:00', NULL, NOW(), NOW()),
(13, 3, 2, 7, 'Skin Barrier Recovery', 'Reduce dryness and irritation', '2026-05-24', 'planned', NULL, NULL, NOW(), NOW()),
(14, 3, 3, 4, 'Hydrating Facial', 'Hydration and soothing treatment', '2026-06-01', 'planned', NULL, NULL, NOW(), NOW()),
(15, 3, 4, 10, 'Post-treatment Follow-up', 'Review barrier condition and long-term routine', '2026-06-20', 'planned', NULL, NULL, NOW(), NOW()),

-- Plan 4: Bui Gia Bao - Acne Scar
(16, 4, 1, 9, 'Melasma Consultation', 'Skin texture and scar evaluation', '2026-05-20', 'completed', '2026-05-20 11:30:00', NULL, NOW(), NOW()),
(17, 4, 2, 6, 'Laser Acne Scar Care', 'First laser scar treatment', '2026-05-28', 'planned', NULL, NULL, NOW(), NOW()),
(18, 4, 3, 7, 'Skin Barrier Recovery', 'Post-laser recovery session', '2026-06-04', 'planned', NULL, NULL, NOW(), NOW()),
(19, 4, 4, 6, 'Laser Acne Scar Care', 'Second laser scar treatment', '2026-06-25', 'planned', NULL, NULL, NOW(), NOW()),
(20, 4, 5, 10, 'Post-treatment Follow-up', 'Compare texture improvement and plan next course', '2026-08-20', 'planned', NULL, NULL, NOW(), NOW()),

-- Plan 5: Nguyen Thanh Van - Melasma
(21, 5, 1, 9, 'Melasma Consultation', 'Melasma assessment and treatment planning', '2026-05-21', 'completed', '2026-05-21 10:00:00', NULL, NOW(), NOW()),
(22, 5, 2, 5, 'Brightening Peel', 'Gentle brightening treatment', '2026-05-29', 'planned', NULL, NULL, NOW(), NOW()),
(23, 5, 3, 4, 'Hydrating Facial', 'Recovery and moisture support', '2026-06-05', 'planned', NULL, NULL, NOW(), NOW()),
(24, 5, 4, 5, 'Brightening Peel', 'Second controlled peel', '2026-06-19', 'planned', NULL, NULL, NOW(), NOW()),
(25, 5, 5, 10, 'Post-treatment Follow-up', 'Review pigmentation changes', '2026-07-10', 'planned', NULL, NULL, NOW(), NOW()),

-- Plan 6: Completed historical course
(26, 6, 1, 7, 'Skin Barrier Recovery', 'Initial calming treatment', '2026-03-01', 'completed', '2026-03-01 10:00:00', NULL, NOW(), NOW()),
(27, 6, 2, 4, 'Hydrating Facial', 'Hydration recovery', '2026-03-10', 'completed', '2026-03-10 10:00:00', NULL, NOW(), NOW()),
(28, 6, 3, 7, 'Skin Barrier Recovery', 'Reduce redness and sensitivity', '2026-03-22', 'completed', '2026-03-22 10:00:00', NULL, NOW(), NOW()),
(29, 6, 4, 10, 'Post-treatment Follow-up', 'Final review and home care guidance', '2026-04-15', 'completed', '2026-04-15 10:00:00', NULL, NOW(), NOW());

-- =========================================================
-- 9. SESSION RECORDS
-- Clinical evidence for completed treatment sessions.
-- =========================================================

INSERT INTO session_records
(id, plan_session_id, clinical_observations, outcome_rating, next_focus, treatment_date, skin_response, pain_level, products_used, home_care, created_at, updated_at)
VALUES
(1, 1, 'Customer has moderate inflammatory acne around cheeks and jawline. Oil level is high, with visible clogged pores.', 4, 'Start acne treatment with extraction and inflammation control.', '2026-05-15', 'Stable after consultation. No active irritation observed.', 1, 'Gentle cleanser, calming toner, non-comedogenic moisturizer.', 'Avoid heavy makeup for 24 hours. Use sunscreen every morning.', NOW(), NOW()),
(2, 7, 'Post-acne marks are visible on both cheeks. No active severe acne. Skin tolerance appears acceptable for mild brightening plan.', 4, 'Proceed with mild peel and hydration support.', '2026-05-16', 'Slight redness after assessment, resolved quickly.', 1, 'Brightening serum patch test, soothing gel.', 'Use sunscreen carefully. Avoid exfoliation before next visit.', NOW(), NOW()),
(3, 12, 'Skin appears dry and reactive with mild redness. Barrier support is recommended before any active treatment.', 5, 'Continue barrier repair and avoid strong exfoliating ingredients.', '2026-05-16', 'Good response to calming mask. Redness reduced after session.', 1, 'Barrier cream, hydrating serum, calming mask.', 'Avoid retinoids and acids. Maintain simple skincare routine.', NOW(), NOW()),
(4, 16, 'Acne scars are visible on cheeks with uneven skin texture. Customer is suitable for gradual laser-based treatment.', 4, 'Prepare first laser session with recovery planning.', '2026-05-20', 'No immediate negative reaction after assessment.', 1, 'Skin analysis, calming gel.', 'Use sunscreen daily. Avoid active acne picking.', NOW(), NOW()),
(5, 21, 'Melasma patches are visible on cheek area. Customer needs gentle pigmentation management and strict sun protection.', 4, 'Begin brightening and hydration-supported plan.', '2026-05-21', 'Skin stable after consultation.', 1, 'Pigmentation assessment, sunscreen recommendation.', 'Apply sunscreen every 2-3 hours when outdoors.', NOW(), NOW()),
(6, 26, 'Sensitive skin with redness around cheeks. Initial recovery treatment started.', 4, 'Hydration recovery and redness monitoring.', '2026-03-01', 'Mild redness reduced after treatment.', 1, 'Calming mask, barrier cream.', 'Keep skincare routine simple.', NOW(), NOW()),
(7, 27, 'Skin hydration improved. Redness remains but is less intense.', 5, 'Continue calming support.', '2026-03-10', 'Good hydration response.', 1, 'Hydrating serum, recovery cream.', 'Avoid fragrance-based skincare.', NOW(), NOW()),
(8, 28, 'Customer reports less sensitivity. Skin surface appears more stable.', 5, 'Final follow-up and maintenance guidance.', '2026-03-22', 'Stable and positive response.', 1, 'Barrier serum, soothing mask.', 'Continue sunscreen and gentle moisturizer.', NOW(), NOW()),
(9, 29, 'Treatment course completed. Redness and irritation have improved significantly.', 5, 'Maintenance care and optional future hydration sessions.', '2026-04-15', 'Excellent recovery, no visible irritation after session.', 1, 'Moisturizer, sunscreen recommendation.', 'Maintain simple routine and book follow-up if irritation returns.', NOW(), NOW());

-- =========================================================
-- 10. DEMO QUERIES FOR REPORT SCREENSHOTS
-- These queries are optional and useful for evidence capture.
-- =========================================================

-- Today appointment list
SELECT
    a.booking_code,
    a.customer_name,
    a.service_name,
    a.specialist_name,
    a.appointment_date,
    a.appointment_time,
    a.status,
    a.payment_status
FROM appointments a
ORDER BY a.appointment_date, a.appointment_time;

-- Active treatment courses
SELECT
    tp.id,
    tp.customer_name,
    tp.specialist_name,
    tp.title,
    tp.status,
    tp.start_date,
    tp.expected_end_date,
    COUNT(tps.id) AS total_sessions,
    SUM(CASE WHEN tps.completed_at IS NOT NULL THEN 1 ELSE 0 END) AS completed_sessions
FROM treatment_plans tp
LEFT JOIN treatment_plan_sessions tps ON tps.plan_id = tp.id
GROUP BY
    tp.id,
    tp.customer_name,
    tp.specialist_name,
    tp.title,
    tp.status,
    tp.start_date,
    tp.expected_end_date
ORDER BY tp.created_at DESC;

-- Payment visibility summary
SELECT
    payment_status,
    COUNT(*) AS appointment_count,
    SUM(total_amount) AS total_amount
FROM appointments
GROUP BY payment_status;

-- Dashboard summary query
SELECT
    COUNT(*) AS total_appointments,
    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) AS pending_appointments,
    SUM(CASE WHEN status = 'confirmed' THEN 1 ELSE 0 END) AS confirmed_appointments,
    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) AS completed_appointments,
    SUM(CASE WHEN payment_status = 'paid' THEN total_amount ELSE 0 END) AS paid_revenue
FROM appointments
WHERE status != 'cancelled';

-- Customers without active treatment plan
SELECT
    c.Customer_ID,
    c.Name,
    c.Phone,
    c.SkinType,
    c.SkinConcern
FROM Customer c
WHERE NOT EXISTS (
    SELECT 1
    FROM treatment_plans tp
    WHERE tp.customer_id = c.Customer_ID
      AND tp.status = 'active'
)
ORDER BY c.Customer_ID;

-- =========================================================
-- END OF FILE
-- =========================================================