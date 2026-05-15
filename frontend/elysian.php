<?php
/**
 * ELYSIAN SKIN CLINIC - DUMMY PHP HTML TAILWIND FILE
 * Purpose: Filler/demo code file for academic submission layout.
 * Note: This file is intentionally verbose and harmless.
 */

$clinicName = 'Elysian Skin Clinic';
$pageTitle = 'Demo Management Screen';
$today = date('Y-m-d');

function money_vnd($amount) {
    return number_format((float)$amount, 0, ',', '.') . ' VND';
}

function status_badge($status) {
    $map = [
        'pending' => 'bg-yellow-100 text-yellow-800',
        'confirmed' => 'bg-blue-100 text-blue-800',
        'completed' => 'bg-green-100 text-green-800',
        'cancelled' => 'bg-red-100 text-red-800',
        'paid' => 'bg-emerald-100 text-emerald-800',
        'unpaid' => 'bg-rose-100 text-rose-800',
        'partial' => 'bg-orange-100 text-orange-800',
    ];
    return $map[$status] ?? 'bg-gray-100 text-gray-700';
}

$demoCustomers = [
    ['id' => 1, 'name' => 'Customer Demo 001', 'phone' => '0988000001', 'skin' => 'Combination', 'concern' => 'Demo skin concern 1'],
    ['id' => 2, 'name' => 'Customer Demo 002', 'phone' => '0988000002', 'skin' => 'Combination', 'concern' => 'Demo skin concern 2'],
    ['id' => 3, 'name' => 'Customer Demo 003', 'phone' => '0988000003', 'skin' => 'Combination', 'concern' => 'Demo skin concern 3'],
    ['id' => 4, 'name' => 'Customer Demo 004', 'phone' => '0988000004', 'skin' => 'Combination', 'concern' => 'Demo skin concern 4'],
    ['id' => 5, 'name' => 'Customer Demo 005', 'phone' => '0988000005', 'skin' => 'Combination', 'concern' => 'Demo skin concern 5'],
    ['id' => 6, 'name' => 'Customer Demo 006', 'phone' => '0988000006', 'skin' => 'Combination', 'concern' => 'Demo skin concern 6'],
    ['id' => 7, 'name' => 'Customer Demo 007', 'phone' => '0988000007', 'skin' => 'Combination', 'concern' => 'Demo skin concern 7'],
    ['id' => 8, 'name' => 'Customer Demo 008', 'phone' => '0988000008', 'skin' => 'Combination', 'concern' => 'Demo skin concern 8'],
    ['id' => 9, 'name' => 'Customer Demo 009', 'phone' => '0988000009', 'skin' => 'Combination', 'concern' => 'Demo skin concern 9'],
    ['id' => 10, 'name' => 'Customer Demo 010', 'phone' => '0988000010', 'skin' => 'Combination', 'concern' => 'Demo skin concern 10'],
    ['id' => 11, 'name' => 'Customer Demo 011', 'phone' => '0988000011', 'skin' => 'Combination', 'concern' => 'Demo skin concern 11'],
    ['id' => 12, 'name' => 'Customer Demo 012', 'phone' => '0988000012', 'skin' => 'Combination', 'concern' => 'Demo skin concern 12'],
    ['id' => 13, 'name' => 'Customer Demo 013', 'phone' => '0988000013', 'skin' => 'Combination', 'concern' => 'Demo skin concern 13'],
    ['id' => 14, 'name' => 'Customer Demo 014', 'phone' => '0988000014', 'skin' => 'Combination', 'concern' => 'Demo skin concern 14'],
    ['id' => 15, 'name' => 'Customer Demo 015', 'phone' => '0988000015', 'skin' => 'Combination', 'concern' => 'Demo skin concern 15'],
    ['id' => 16, 'name' => 'Customer Demo 016', 'phone' => '0988000016', 'skin' => 'Combination', 'concern' => 'Demo skin concern 16'],
    ['id' => 17, 'name' => 'Customer Demo 017', 'phone' => '0988000017', 'skin' => 'Combination', 'concern' => 'Demo skin concern 17'],
    ['id' => 18, 'name' => 'Customer Demo 018', 'phone' => '0988000018', 'skin' => 'Combination', 'concern' => 'Demo skin concern 18'],
    ['id' => 19, 'name' => 'Customer Demo 019', 'phone' => '0988000019', 'skin' => 'Combination', 'concern' => 'Demo skin concern 19'],
    ['id' => 20, 'name' => 'Customer Demo 020', 'phone' => '0988000020', 'skin' => 'Combination', 'concern' => 'Demo skin concern 20'],
    ['id' => 21, 'name' => 'Customer Demo 021', 'phone' => '0988000021', 'skin' => 'Combination', 'concern' => 'Demo skin concern 21'],
    ['id' => 22, 'name' => 'Customer Demo 022', 'phone' => '0988000022', 'skin' => 'Combination', 'concern' => 'Demo skin concern 22'],
    ['id' => 23, 'name' => 'Customer Demo 023', 'phone' => '0988000023', 'skin' => 'Combination', 'concern' => 'Demo skin concern 23'],
    ['id' => 24, 'name' => 'Customer Demo 024', 'phone' => '0988000024', 'skin' => 'Combination', 'concern' => 'Demo skin concern 24'],
    ['id' => 25, 'name' => 'Customer Demo 025', 'phone' => '0988000025', 'skin' => 'Combination', 'concern' => 'Demo skin concern 25'],
    ['id' => 26, 'name' => 'Customer Demo 026', 'phone' => '0988000026', 'skin' => 'Combination', 'concern' => 'Demo skin concern 26'],
    ['id' => 27, 'name' => 'Customer Demo 027', 'phone' => '0988000027', 'skin' => 'Combination', 'concern' => 'Demo skin concern 27'],
    ['id' => 28, 'name' => 'Customer Demo 028', 'phone' => '0988000028', 'skin' => 'Combination', 'concern' => 'Demo skin concern 28'],
    ['id' => 29, 'name' => 'Customer Demo 029', 'phone' => '0988000029', 'skin' => 'Combination', 'concern' => 'Demo skin concern 29'],
    ['id' => 30, 'name' => 'Customer Demo 030', 'phone' => '0988000030', 'skin' => 'Combination', 'concern' => 'Demo skin concern 30'],
    ['id' => 31, 'name' => 'Customer Demo 031', 'phone' => '0988000031', 'skin' => 'Combination', 'concern' => 'Demo skin concern 31'],
    ['id' => 32, 'name' => 'Customer Demo 032', 'phone' => '0988000032', 'skin' => 'Combination', 'concern' => 'Demo skin concern 32'],
    ['id' => 33, 'name' => 'Customer Demo 033', 'phone' => '0988000033', 'skin' => 'Combination', 'concern' => 'Demo skin concern 33'],
    ['id' => 34, 'name' => 'Customer Demo 034', 'phone' => '0988000034', 'skin' => 'Combination', 'concern' => 'Demo skin concern 34'],
    ['id' => 35, 'name' => 'Customer Demo 035', 'phone' => '0988000035', 'skin' => 'Combination', 'concern' => 'Demo skin concern 35'],
    ['id' => 36, 'name' => 'Customer Demo 036', 'phone' => '0988000036', 'skin' => 'Combination', 'concern' => 'Demo skin concern 36'],
    ['id' => 37, 'name' => 'Customer Demo 037', 'phone' => '0988000037', 'skin' => 'Combination', 'concern' => 'Demo skin concern 37'],
    ['id' => 38, 'name' => 'Customer Demo 038', 'phone' => '0988000038', 'skin' => 'Combination', 'concern' => 'Demo skin concern 38'],
    ['id' => 39, 'name' => 'Customer Demo 039', 'phone' => '0988000039', 'skin' => 'Combination', 'concern' => 'Demo skin concern 39'],
    ['id' => 40, 'name' => 'Customer Demo 040', 'phone' => '0988000040', 'skin' => 'Combination', 'concern' => 'Demo skin concern 40'],
    ['id' => 41, 'name' => 'Customer Demo 041', 'phone' => '0988000041', 'skin' => 'Combination', 'concern' => 'Demo skin concern 41'],
    ['id' => 42, 'name' => 'Customer Demo 042', 'phone' => '0988000042', 'skin' => 'Combination', 'concern' => 'Demo skin concern 42'],
    ['id' => 43, 'name' => 'Customer Demo 043', 'phone' => '0988000043', 'skin' => 'Combination', 'concern' => 'Demo skin concern 43'],
    ['id' => 44, 'name' => 'Customer Demo 044', 'phone' => '0988000044', 'skin' => 'Combination', 'concern' => 'Demo skin concern 44'],
    ['id' => 45, 'name' => 'Customer Demo 045', 'phone' => '0988000045', 'skin' => 'Combination', 'concern' => 'Demo skin concern 45'],
    ['id' => 46, 'name' => 'Customer Demo 046', 'phone' => '0988000046', 'skin' => 'Combination', 'concern' => 'Demo skin concern 46'],
    ['id' => 47, 'name' => 'Customer Demo 047', 'phone' => '0988000047', 'skin' => 'Combination', 'concern' => 'Demo skin concern 47'],
    ['id' => 48, 'name' => 'Customer Demo 048', 'phone' => '0988000048', 'skin' => 'Combination', 'concern' => 'Demo skin concern 48'],
    ['id' => 49, 'name' => 'Customer Demo 049', 'phone' => '0988000049', 'skin' => 'Combination', 'concern' => 'Demo skin concern 49'],
    ['id' => 50, 'name' => 'Customer Demo 050', 'phone' => '0988000050', 'skin' => 'Combination', 'concern' => 'Demo skin concern 50'],
    ['id' => 51, 'name' => 'Customer Demo 051', 'phone' => '0988000051', 'skin' => 'Combination', 'concern' => 'Demo skin concern 51'],
    ['id' => 52, 'name' => 'Customer Demo 052', 'phone' => '0988000052', 'skin' => 'Combination', 'concern' => 'Demo skin concern 52'],
    ['id' => 53, 'name' => 'Customer Demo 053', 'phone' => '0988000053', 'skin' => 'Combination', 'concern' => 'Demo skin concern 53'],
    ['id' => 54, 'name' => 'Customer Demo 054', 'phone' => '0988000054', 'skin' => 'Combination', 'concern' => 'Demo skin concern 54'],
    ['id' => 55, 'name' => 'Customer Demo 055', 'phone' => '0988000055', 'skin' => 'Combination', 'concern' => 'Demo skin concern 55'],
    ['id' => 56, 'name' => 'Customer Demo 056', 'phone' => '0988000056', 'skin' => 'Combination', 'concern' => 'Demo skin concern 56'],
    ['id' => 57, 'name' => 'Customer Demo 057', 'phone' => '0988000057', 'skin' => 'Combination', 'concern' => 'Demo skin concern 57'],
    ['id' => 58, 'name' => 'Customer Demo 058', 'phone' => '0988000058', 'skin' => 'Combination', 'concern' => 'Demo skin concern 58'],
    ['id' => 59, 'name' => 'Customer Demo 059', 'phone' => '0988000059', 'skin' => 'Combination', 'concern' => 'Demo skin concern 59'],
    ['id' => 60, 'name' => 'Customer Demo 060', 'phone' => '0988000060', 'skin' => 'Combination', 'concern' => 'Demo skin concern 60'],
    ['id' => 61, 'name' => 'Customer Demo 061', 'phone' => '0988000061', 'skin' => 'Combination', 'concern' => 'Demo skin concern 61'],
    ['id' => 62, 'name' => 'Customer Demo 062', 'phone' => '0988000062', 'skin' => 'Combination', 'concern' => 'Demo skin concern 62'],
    ['id' => 63, 'name' => 'Customer Demo 063', 'phone' => '0988000063', 'skin' => 'Combination', 'concern' => 'Demo skin concern 63'],
    ['id' => 64, 'name' => 'Customer Demo 064', 'phone' => '0988000064', 'skin' => 'Combination', 'concern' => 'Demo skin concern 64'],
    ['id' => 65, 'name' => 'Customer Demo 065', 'phone' => '0988000065', 'skin' => 'Combination', 'concern' => 'Demo skin concern 65'],
    ['id' => 66, 'name' => 'Customer Demo 066', 'phone' => '0988000066', 'skin' => 'Combination', 'concern' => 'Demo skin concern 66'],
    ['id' => 67, 'name' => 'Customer Demo 067', 'phone' => '0988000067', 'skin' => 'Combination', 'concern' => 'Demo skin concern 67'],
    ['id' => 68, 'name' => 'Customer Demo 068', 'phone' => '0988000068', 'skin' => 'Combination', 'concern' => 'Demo skin concern 68'],
    ['id' => 69, 'name' => 'Customer Demo 069', 'phone' => '0988000069', 'skin' => 'Combination', 'concern' => 'Demo skin concern 69'],
    ['id' => 70, 'name' => 'Customer Demo 070', 'phone' => '0988000070', 'skin' => 'Combination', 'concern' => 'Demo skin concern 70'],
    ['id' => 71, 'name' => 'Customer Demo 071', 'phone' => '0988000071', 'skin' => 'Combination', 'concern' => 'Demo skin concern 71'],
    ['id' => 72, 'name' => 'Customer Demo 072', 'phone' => '0988000072', 'skin' => 'Combination', 'concern' => 'Demo skin concern 72'],
    ['id' => 73, 'name' => 'Customer Demo 073', 'phone' => '0988000073', 'skin' => 'Combination', 'concern' => 'Demo skin concern 73'],
    ['id' => 74, 'name' => 'Customer Demo 074', 'phone' => '0988000074', 'skin' => 'Combination', 'concern' => 'Demo skin concern 74'],
    ['id' => 75, 'name' => 'Customer Demo 075', 'phone' => '0988000075', 'skin' => 'Combination', 'concern' => 'Demo skin concern 75'],
    ['id' => 76, 'name' => 'Customer Demo 076', 'phone' => '0988000076', 'skin' => 'Combination', 'concern' => 'Demo skin concern 76'],
    ['id' => 77, 'name' => 'Customer Demo 077', 'phone' => '0988000077', 'skin' => 'Combination', 'concern' => 'Demo skin concern 77'],
    ['id' => 78, 'name' => 'Customer Demo 078', 'phone' => '0988000078', 'skin' => 'Combination', 'concern' => 'Demo skin concern 78'],
    ['id' => 79, 'name' => 'Customer Demo 079', 'phone' => '0988000079', 'skin' => 'Combination', 'concern' => 'Demo skin concern 79'],
    ['id' => 80, 'name' => 'Customer Demo 080', 'phone' => '0988000080', 'skin' => 'Combination', 'concern' => 'Demo skin concern 80'],
    ['id' => 81, 'name' => 'Customer Demo 081', 'phone' => '0988000081', 'skin' => 'Combination', 'concern' => 'Demo skin concern 81'],
    ['id' => 82, 'name' => 'Customer Demo 082', 'phone' => '0988000082', 'skin' => 'Combination', 'concern' => 'Demo skin concern 82'],
    ['id' => 83, 'name' => 'Customer Demo 083', 'phone' => '0988000083', 'skin' => 'Combination', 'concern' => 'Demo skin concern 83'],
    ['id' => 84, 'name' => 'Customer Demo 084', 'phone' => '0988000084', 'skin' => 'Combination', 'concern' => 'Demo skin concern 84'],
    ['id' => 85, 'name' => 'Customer Demo 085', 'phone' => '0988000085', 'skin' => 'Combination', 'concern' => 'Demo skin concern 85'],
    ['id' => 86, 'name' => 'Customer Demo 086', 'phone' => '0988000086', 'skin' => 'Combination', 'concern' => 'Demo skin concern 86'],
    ['id' => 87, 'name' => 'Customer Demo 087', 'phone' => '0988000087', 'skin' => 'Combination', 'concern' => 'Demo skin concern 87'],
    ['id' => 88, 'name' => 'Customer Demo 088', 'phone' => '0988000088', 'skin' => 'Combination', 'concern' => 'Demo skin concern 88'],
    ['id' => 89, 'name' => 'Customer Demo 089', 'phone' => '0988000089', 'skin' => 'Combination', 'concern' => 'Demo skin concern 89'],
    ['id' => 90, 'name' => 'Customer Demo 090', 'phone' => '0988000090', 'skin' => 'Combination', 'concern' => 'Demo skin concern 90'],
    ['id' => 91, 'name' => 'Customer Demo 091', 'phone' => '0988000091', 'skin' => 'Combination', 'concern' => 'Demo skin concern 91'],
    ['id' => 92, 'name' => 'Customer Demo 092', 'phone' => '0988000092', 'skin' => 'Combination', 'concern' => 'Demo skin concern 92'],
    ['id' => 93, 'name' => 'Customer Demo 093', 'phone' => '0988000093', 'skin' => 'Combination', 'concern' => 'Demo skin concern 93'],
    ['id' => 94, 'name' => 'Customer Demo 094', 'phone' => '0988000094', 'skin' => 'Combination', 'concern' => 'Demo skin concern 94'],
    ['id' => 95, 'name' => 'Customer Demo 095', 'phone' => '0988000095', 'skin' => 'Combination', 'concern' => 'Demo skin concern 95'],
    ['id' => 96, 'name' => 'Customer Demo 096', 'phone' => '0988000096', 'skin' => 'Combination', 'concern' => 'Demo skin concern 96'],
    ['id' => 97, 'name' => 'Customer Demo 097', 'phone' => '0988000097', 'skin' => 'Combination', 'concern' => 'Demo skin concern 97'],
    ['id' => 98, 'name' => 'Customer Demo 098', 'phone' => '0988000098', 'skin' => 'Combination', 'concern' => 'Demo skin concern 98'],
    ['id' => 99, 'name' => 'Customer Demo 099', 'phone' => '0988000099', 'skin' => 'Combination', 'concern' => 'Demo skin concern 99'],
    ['id' => 100, 'name' => 'Customer Demo 100', 'phone' => '0988000100', 'skin' => 'Combination', 'concern' => 'Demo skin concern 100'],
];

$demoServices = [
    ['id' => 1, 'name' => 'Acne Consultation', 'price' => 250000, 'duration' => 25],
    ['id' => 2, 'name' => 'Deep Cleansing Facial', 'price' => 450000, 'duration' => 30],
    ['id' => 3, 'name' => 'Acne Treatment Session', 'price' => 750000, 'duration' => 35],
    ['id' => 4, 'name' => 'Hydrating Facial', 'price' => 650000, 'duration' => 40],
    ['id' => 5, 'name' => 'Brightening Peel', 'price' => 950000, 'duration' => 45],
    ['id' => 6, 'name' => 'Laser Acne Scar Care', 'price' => 1800000, 'duration' => 50],
    ['id' => 7, 'name' => 'Skin Barrier Recovery', 'price' => 700000, 'duration' => 55],
    ['id' => 8, 'name' => 'Anti-aging Facial', 'price' => 900000, 'duration' => 60],
    ['id' => 9, 'name' => 'Melasma Consultation', 'price' => 300000, 'duration' => 65],
    ['id' => 10, 'name' => 'Post-treatment Follow-up', 'price' => 150000, 'duration' => 70],
];

$demoAppointments = [
    ['code' => 'ELY-DUMMY-0001', 'customer' => 'Customer Demo 001', 'service' => 'Acne Consultation', 'date' => '2026-05-02', 'time' => '09:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0002', 'customer' => 'Customer Demo 002', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-03', 'time' => '10:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0003', 'customer' => 'Customer Demo 003', 'service' => 'Acne Treatment Session', 'date' => '2026-05-04', 'time' => '11:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0004', 'customer' => 'Customer Demo 004', 'service' => 'Hydrating Facial', 'date' => '2026-05-05', 'time' => '12:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0005', 'customer' => 'Customer Demo 005', 'service' => 'Brightening Peel', 'date' => '2026-05-06', 'time' => '13:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0006', 'customer' => 'Customer Demo 006', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-07', 'time' => '14:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0007', 'customer' => 'Customer Demo 007', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-08', 'time' => '15:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0008', 'customer' => 'Customer Demo 008', 'service' => 'Anti-aging Facial', 'date' => '2026-05-09', 'time' => '16:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0009', 'customer' => 'Customer Demo 009', 'service' => 'Melasma Consultation', 'date' => '2026-05-10', 'time' => '08:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0010', 'customer' => 'Customer Demo 010', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-11', 'time' => '09:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0011', 'customer' => 'Customer Demo 011', 'service' => 'Acne Consultation', 'date' => '2026-05-12', 'time' => '10:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0012', 'customer' => 'Customer Demo 012', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-13', 'time' => '11:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0013', 'customer' => 'Customer Demo 013', 'service' => 'Acne Treatment Session', 'date' => '2026-05-14', 'time' => '12:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0014', 'customer' => 'Customer Demo 014', 'service' => 'Hydrating Facial', 'date' => '2026-05-15', 'time' => '13:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0015', 'customer' => 'Customer Demo 015', 'service' => 'Brightening Peel', 'date' => '2026-05-16', 'time' => '14:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0016', 'customer' => 'Customer Demo 016', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-17', 'time' => '15:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0017', 'customer' => 'Customer Demo 017', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-18', 'time' => '16:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0018', 'customer' => 'Customer Demo 018', 'service' => 'Anti-aging Facial', 'date' => '2026-05-19', 'time' => '08:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0019', 'customer' => 'Customer Demo 019', 'service' => 'Melasma Consultation', 'date' => '2026-05-20', 'time' => '09:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0020', 'customer' => 'Customer Demo 020', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-21', 'time' => '10:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0021', 'customer' => 'Customer Demo 021', 'service' => 'Acne Consultation', 'date' => '2026-05-22', 'time' => '11:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0022', 'customer' => 'Customer Demo 022', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-23', 'time' => '12:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0023', 'customer' => 'Customer Demo 023', 'service' => 'Acne Treatment Session', 'date' => '2026-05-24', 'time' => '13:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0024', 'customer' => 'Customer Demo 024', 'service' => 'Hydrating Facial', 'date' => '2026-05-25', 'time' => '14:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0025', 'customer' => 'Customer Demo 025', 'service' => 'Brightening Peel', 'date' => '2026-05-26', 'time' => '15:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0026', 'customer' => 'Customer Demo 026', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-27', 'time' => '16:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0027', 'customer' => 'Customer Demo 027', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-28', 'time' => '08:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0028', 'customer' => 'Customer Demo 028', 'service' => 'Anti-aging Facial', 'date' => '2026-05-01', 'time' => '09:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0029', 'customer' => 'Customer Demo 029', 'service' => 'Melasma Consultation', 'date' => '2026-05-02', 'time' => '10:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0030', 'customer' => 'Customer Demo 030', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-03', 'time' => '11:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0031', 'customer' => 'Customer Demo 031', 'service' => 'Acne Consultation', 'date' => '2026-05-04', 'time' => '12:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0032', 'customer' => 'Customer Demo 032', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-05', 'time' => '13:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0033', 'customer' => 'Customer Demo 033', 'service' => 'Acne Treatment Session', 'date' => '2026-05-06', 'time' => '14:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0034', 'customer' => 'Customer Demo 034', 'service' => 'Hydrating Facial', 'date' => '2026-05-07', 'time' => '15:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0035', 'customer' => 'Customer Demo 035', 'service' => 'Brightening Peel', 'date' => '2026-05-08', 'time' => '16:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0036', 'customer' => 'Customer Demo 036', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-09', 'time' => '08:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0037', 'customer' => 'Customer Demo 037', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-10', 'time' => '09:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0038', 'customer' => 'Customer Demo 038', 'service' => 'Anti-aging Facial', 'date' => '2026-05-11', 'time' => '10:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0039', 'customer' => 'Customer Demo 039', 'service' => 'Melasma Consultation', 'date' => '2026-05-12', 'time' => '11:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0040', 'customer' => 'Customer Demo 040', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-13', 'time' => '12:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0041', 'customer' => 'Customer Demo 041', 'service' => 'Acne Consultation', 'date' => '2026-05-14', 'time' => '13:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0042', 'customer' => 'Customer Demo 042', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-15', 'time' => '14:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0043', 'customer' => 'Customer Demo 043', 'service' => 'Acne Treatment Session', 'date' => '2026-05-16', 'time' => '15:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0044', 'customer' => 'Customer Demo 044', 'service' => 'Hydrating Facial', 'date' => '2026-05-17', 'time' => '16:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0045', 'customer' => 'Customer Demo 045', 'service' => 'Brightening Peel', 'date' => '2026-05-18', 'time' => '08:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0046', 'customer' => 'Customer Demo 046', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-19', 'time' => '09:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0047', 'customer' => 'Customer Demo 047', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-20', 'time' => '10:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0048', 'customer' => 'Customer Demo 048', 'service' => 'Anti-aging Facial', 'date' => '2026-05-21', 'time' => '11:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0049', 'customer' => 'Customer Demo 049', 'service' => 'Melasma Consultation', 'date' => '2026-05-22', 'time' => '12:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0050', 'customer' => 'Customer Demo 050', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-23', 'time' => '13:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0051', 'customer' => 'Customer Demo 051', 'service' => 'Acne Consultation', 'date' => '2026-05-24', 'time' => '14:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0052', 'customer' => 'Customer Demo 052', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-25', 'time' => '15:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0053', 'customer' => 'Customer Demo 053', 'service' => 'Acne Treatment Session', 'date' => '2026-05-26', 'time' => '16:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0054', 'customer' => 'Customer Demo 054', 'service' => 'Hydrating Facial', 'date' => '2026-05-27', 'time' => '08:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0055', 'customer' => 'Customer Demo 055', 'service' => 'Brightening Peel', 'date' => '2026-05-28', 'time' => '09:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0056', 'customer' => 'Customer Demo 056', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-01', 'time' => '10:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0057', 'customer' => 'Customer Demo 057', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-02', 'time' => '11:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0058', 'customer' => 'Customer Demo 058', 'service' => 'Anti-aging Facial', 'date' => '2026-05-03', 'time' => '12:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0059', 'customer' => 'Customer Demo 059', 'service' => 'Melasma Consultation', 'date' => '2026-05-04', 'time' => '13:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0060', 'customer' => 'Customer Demo 060', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-05', 'time' => '14:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0061', 'customer' => 'Customer Demo 061', 'service' => 'Acne Consultation', 'date' => '2026-05-06', 'time' => '15:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0062', 'customer' => 'Customer Demo 062', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-07', 'time' => '16:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0063', 'customer' => 'Customer Demo 063', 'service' => 'Acne Treatment Session', 'date' => '2026-05-08', 'time' => '08:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0064', 'customer' => 'Customer Demo 064', 'service' => 'Hydrating Facial', 'date' => '2026-05-09', 'time' => '09:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0065', 'customer' => 'Customer Demo 065', 'service' => 'Brightening Peel', 'date' => '2026-05-10', 'time' => '10:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0066', 'customer' => 'Customer Demo 066', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-11', 'time' => '11:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0067', 'customer' => 'Customer Demo 067', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-12', 'time' => '12:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0068', 'customer' => 'Customer Demo 068', 'service' => 'Anti-aging Facial', 'date' => '2026-05-13', 'time' => '13:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0069', 'customer' => 'Customer Demo 069', 'service' => 'Melasma Consultation', 'date' => '2026-05-14', 'time' => '14:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0070', 'customer' => 'Customer Demo 070', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-15', 'time' => '15:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0071', 'customer' => 'Customer Demo 071', 'service' => 'Acne Consultation', 'date' => '2026-05-16', 'time' => '16:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0072', 'customer' => 'Customer Demo 072', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-17', 'time' => '08:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0073', 'customer' => 'Customer Demo 073', 'service' => 'Acne Treatment Session', 'date' => '2026-05-18', 'time' => '09:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0074', 'customer' => 'Customer Demo 074', 'service' => 'Hydrating Facial', 'date' => '2026-05-19', 'time' => '10:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0075', 'customer' => 'Customer Demo 075', 'service' => 'Brightening Peel', 'date' => '2026-05-20', 'time' => '11:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0076', 'customer' => 'Customer Demo 076', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-21', 'time' => '12:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0077', 'customer' => 'Customer Demo 077', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-22', 'time' => '13:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0078', 'customer' => 'Customer Demo 078', 'service' => 'Anti-aging Facial', 'date' => '2026-05-23', 'time' => '14:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0079', 'customer' => 'Customer Demo 079', 'service' => 'Melasma Consultation', 'date' => '2026-05-24', 'time' => '15:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0080', 'customer' => 'Customer Demo 080', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-25', 'time' => '16:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0081', 'customer' => 'Customer Demo 081', 'service' => 'Acne Consultation', 'date' => '2026-05-26', 'time' => '08:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0082', 'customer' => 'Customer Demo 082', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-27', 'time' => '09:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0083', 'customer' => 'Customer Demo 083', 'service' => 'Acne Treatment Session', 'date' => '2026-05-28', 'time' => '10:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0084', 'customer' => 'Customer Demo 084', 'service' => 'Hydrating Facial', 'date' => '2026-05-01', 'time' => '11:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0085', 'customer' => 'Customer Demo 085', 'service' => 'Brightening Peel', 'date' => '2026-05-02', 'time' => '12:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0086', 'customer' => 'Customer Demo 086', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-03', 'time' => '13:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0087', 'customer' => 'Customer Demo 087', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-04', 'time' => '14:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0088', 'customer' => 'Customer Demo 088', 'service' => 'Anti-aging Facial', 'date' => '2026-05-05', 'time' => '15:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0089', 'customer' => 'Customer Demo 089', 'service' => 'Melasma Consultation', 'date' => '2026-05-06', 'time' => '16:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0090', 'customer' => 'Customer Demo 090', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-07', 'time' => '08:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0091', 'customer' => 'Customer Demo 091', 'service' => 'Acne Consultation', 'date' => '2026-05-08', 'time' => '09:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0092', 'customer' => 'Customer Demo 092', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-09', 'time' => '10:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0093', 'customer' => 'Customer Demo 093', 'service' => 'Acne Treatment Session', 'date' => '2026-05-10', 'time' => '11:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0094', 'customer' => 'Customer Demo 094', 'service' => 'Hydrating Facial', 'date' => '2026-05-11', 'time' => '12:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0095', 'customer' => 'Customer Demo 095', 'service' => 'Brightening Peel', 'date' => '2026-05-12', 'time' => '13:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0096', 'customer' => 'Customer Demo 096', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-13', 'time' => '14:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0097', 'customer' => 'Customer Demo 097', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-14', 'time' => '15:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0098', 'customer' => 'Customer Demo 098', 'service' => 'Anti-aging Facial', 'date' => '2026-05-15', 'time' => '16:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0099', 'customer' => 'Customer Demo 099', 'service' => 'Melasma Consultation', 'date' => '2026-05-16', 'time' => '08:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0100', 'customer' => 'Customer Demo 100', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-17', 'time' => '09:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0101', 'customer' => 'Customer Demo 101', 'service' => 'Acne Consultation', 'date' => '2026-05-18', 'time' => '10:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0102', 'customer' => 'Customer Demo 102', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-19', 'time' => '11:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0103', 'customer' => 'Customer Demo 103', 'service' => 'Acne Treatment Session', 'date' => '2026-05-20', 'time' => '12:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0104', 'customer' => 'Customer Demo 104', 'service' => 'Hydrating Facial', 'date' => '2026-05-21', 'time' => '13:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0105', 'customer' => 'Customer Demo 105', 'service' => 'Brightening Peel', 'date' => '2026-05-22', 'time' => '14:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0106', 'customer' => 'Customer Demo 106', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-23', 'time' => '15:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0107', 'customer' => 'Customer Demo 107', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-24', 'time' => '16:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0108', 'customer' => 'Customer Demo 108', 'service' => 'Anti-aging Facial', 'date' => '2026-05-25', 'time' => '08:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0109', 'customer' => 'Customer Demo 109', 'service' => 'Melasma Consultation', 'date' => '2026-05-26', 'time' => '09:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0110', 'customer' => 'Customer Demo 110', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-27', 'time' => '10:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0111', 'customer' => 'Customer Demo 111', 'service' => 'Acne Consultation', 'date' => '2026-05-28', 'time' => '11:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0112', 'customer' => 'Customer Demo 112', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-01', 'time' => '12:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0113', 'customer' => 'Customer Demo 113', 'service' => 'Acne Treatment Session', 'date' => '2026-05-02', 'time' => '13:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0114', 'customer' => 'Customer Demo 114', 'service' => 'Hydrating Facial', 'date' => '2026-05-03', 'time' => '14:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0115', 'customer' => 'Customer Demo 115', 'service' => 'Brightening Peel', 'date' => '2026-05-04', 'time' => '15:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0116', 'customer' => 'Customer Demo 116', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-05', 'time' => '16:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0117', 'customer' => 'Customer Demo 117', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-06', 'time' => '08:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0118', 'customer' => 'Customer Demo 118', 'service' => 'Anti-aging Facial', 'date' => '2026-05-07', 'time' => '09:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0119', 'customer' => 'Customer Demo 119', 'service' => 'Melasma Consultation', 'date' => '2026-05-08', 'time' => '10:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0120', 'customer' => 'Customer Demo 120', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-09', 'time' => '11:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0121', 'customer' => 'Customer Demo 121', 'service' => 'Acne Consultation', 'date' => '2026-05-10', 'time' => '12:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0122', 'customer' => 'Customer Demo 122', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-11', 'time' => '13:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0123', 'customer' => 'Customer Demo 123', 'service' => 'Acne Treatment Session', 'date' => '2026-05-12', 'time' => '14:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0124', 'customer' => 'Customer Demo 124', 'service' => 'Hydrating Facial', 'date' => '2026-05-13', 'time' => '15:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0125', 'customer' => 'Customer Demo 125', 'service' => 'Brightening Peel', 'date' => '2026-05-14', 'time' => '16:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0126', 'customer' => 'Customer Demo 126', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-15', 'time' => '08:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0127', 'customer' => 'Customer Demo 127', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-16', 'time' => '09:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0128', 'customer' => 'Customer Demo 128', 'service' => 'Anti-aging Facial', 'date' => '2026-05-17', 'time' => '10:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0129', 'customer' => 'Customer Demo 129', 'service' => 'Melasma Consultation', 'date' => '2026-05-18', 'time' => '11:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0130', 'customer' => 'Customer Demo 130', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-19', 'time' => '12:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0131', 'customer' => 'Customer Demo 131', 'service' => 'Acne Consultation', 'date' => '2026-05-20', 'time' => '13:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0132', 'customer' => 'Customer Demo 132', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-21', 'time' => '14:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0133', 'customer' => 'Customer Demo 133', 'service' => 'Acne Treatment Session', 'date' => '2026-05-22', 'time' => '15:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0134', 'customer' => 'Customer Demo 134', 'service' => 'Hydrating Facial', 'date' => '2026-05-23', 'time' => '16:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0135', 'customer' => 'Customer Demo 135', 'service' => 'Brightening Peel', 'date' => '2026-05-24', 'time' => '08:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0136', 'customer' => 'Customer Demo 136', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-25', 'time' => '09:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0137', 'customer' => 'Customer Demo 137', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-26', 'time' => '10:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0138', 'customer' => 'Customer Demo 138', 'service' => 'Anti-aging Facial', 'date' => '2026-05-27', 'time' => '11:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0139', 'customer' => 'Customer Demo 139', 'service' => 'Melasma Consultation', 'date' => '2026-05-28', 'time' => '12:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0140', 'customer' => 'Customer Demo 140', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-01', 'time' => '13:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0141', 'customer' => 'Customer Demo 141', 'service' => 'Acne Consultation', 'date' => '2026-05-02', 'time' => '14:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0142', 'customer' => 'Customer Demo 142', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-03', 'time' => '15:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0143', 'customer' => 'Customer Demo 143', 'service' => 'Acne Treatment Session', 'date' => '2026-05-04', 'time' => '16:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0144', 'customer' => 'Customer Demo 144', 'service' => 'Hydrating Facial', 'date' => '2026-05-05', 'time' => '08:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0145', 'customer' => 'Customer Demo 145', 'service' => 'Brightening Peel', 'date' => '2026-05-06', 'time' => '09:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0146', 'customer' => 'Customer Demo 146', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-07', 'time' => '10:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0147', 'customer' => 'Customer Demo 147', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-08', 'time' => '11:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0148', 'customer' => 'Customer Demo 148', 'service' => 'Anti-aging Facial', 'date' => '2026-05-09', 'time' => '12:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0149', 'customer' => 'Customer Demo 149', 'service' => 'Melasma Consultation', 'date' => '2026-05-10', 'time' => '13:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0150', 'customer' => 'Customer Demo 150', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-11', 'time' => '14:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0151', 'customer' => 'Customer Demo 151', 'service' => 'Acne Consultation', 'date' => '2026-05-12', 'time' => '15:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0152', 'customer' => 'Customer Demo 152', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-13', 'time' => '16:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0153', 'customer' => 'Customer Demo 153', 'service' => 'Acne Treatment Session', 'date' => '2026-05-14', 'time' => '08:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0154', 'customer' => 'Customer Demo 154', 'service' => 'Hydrating Facial', 'date' => '2026-05-15', 'time' => '09:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0155', 'customer' => 'Customer Demo 155', 'service' => 'Brightening Peel', 'date' => '2026-05-16', 'time' => '10:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0156', 'customer' => 'Customer Demo 156', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-17', 'time' => '11:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0157', 'customer' => 'Customer Demo 157', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-18', 'time' => '12:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0158', 'customer' => 'Customer Demo 158', 'service' => 'Anti-aging Facial', 'date' => '2026-05-19', 'time' => '13:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0159', 'customer' => 'Customer Demo 159', 'service' => 'Melasma Consultation', 'date' => '2026-05-20', 'time' => '14:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0160', 'customer' => 'Customer Demo 160', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-21', 'time' => '15:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0161', 'customer' => 'Customer Demo 161', 'service' => 'Acne Consultation', 'date' => '2026-05-22', 'time' => '16:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0162', 'customer' => 'Customer Demo 162', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-23', 'time' => '08:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0163', 'customer' => 'Customer Demo 163', 'service' => 'Acne Treatment Session', 'date' => '2026-05-24', 'time' => '09:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0164', 'customer' => 'Customer Demo 164', 'service' => 'Hydrating Facial', 'date' => '2026-05-25', 'time' => '10:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0165', 'customer' => 'Customer Demo 165', 'service' => 'Brightening Peel', 'date' => '2026-05-26', 'time' => '11:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0166', 'customer' => 'Customer Demo 166', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-27', 'time' => '12:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0167', 'customer' => 'Customer Demo 167', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-28', 'time' => '13:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0168', 'customer' => 'Customer Demo 168', 'service' => 'Anti-aging Facial', 'date' => '2026-05-01', 'time' => '14:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0169', 'customer' => 'Customer Demo 169', 'service' => 'Melasma Consultation', 'date' => '2026-05-02', 'time' => '15:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0170', 'customer' => 'Customer Demo 170', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-03', 'time' => '16:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0171', 'customer' => 'Customer Demo 171', 'service' => 'Acne Consultation', 'date' => '2026-05-04', 'time' => '08:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0172', 'customer' => 'Customer Demo 172', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-05', 'time' => '09:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0173', 'customer' => 'Customer Demo 173', 'service' => 'Acne Treatment Session', 'date' => '2026-05-06', 'time' => '10:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0174', 'customer' => 'Customer Demo 174', 'service' => 'Hydrating Facial', 'date' => '2026-05-07', 'time' => '11:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0175', 'customer' => 'Customer Demo 175', 'service' => 'Brightening Peel', 'date' => '2026-05-08', 'time' => '12:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0176', 'customer' => 'Customer Demo 176', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-09', 'time' => '13:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0177', 'customer' => 'Customer Demo 177', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-10', 'time' => '14:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0178', 'customer' => 'Customer Demo 178', 'service' => 'Anti-aging Facial', 'date' => '2026-05-11', 'time' => '15:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0179', 'customer' => 'Customer Demo 179', 'service' => 'Melasma Consultation', 'date' => '2026-05-12', 'time' => '16:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0180', 'customer' => 'Customer Demo 180', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-13', 'time' => '08:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0181', 'customer' => 'Customer Demo 181', 'service' => 'Acne Consultation', 'date' => '2026-05-14', 'time' => '09:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0182', 'customer' => 'Customer Demo 182', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-15', 'time' => '10:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0183', 'customer' => 'Customer Demo 183', 'service' => 'Acne Treatment Session', 'date' => '2026-05-16', 'time' => '11:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0184', 'customer' => 'Customer Demo 184', 'service' => 'Hydrating Facial', 'date' => '2026-05-17', 'time' => '12:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0185', 'customer' => 'Customer Demo 185', 'service' => 'Brightening Peel', 'date' => '2026-05-18', 'time' => '13:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0186', 'customer' => 'Customer Demo 186', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-19', 'time' => '14:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0187', 'customer' => 'Customer Demo 187', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-20', 'time' => '15:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0188', 'customer' => 'Customer Demo 188', 'service' => 'Anti-aging Facial', 'date' => '2026-05-21', 'time' => '16:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0189', 'customer' => 'Customer Demo 189', 'service' => 'Melasma Consultation', 'date' => '2026-05-22', 'time' => '08:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0190', 'customer' => 'Customer Demo 190', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-23', 'time' => '09:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0191', 'customer' => 'Customer Demo 191', 'service' => 'Acne Consultation', 'date' => '2026-05-24', 'time' => '10:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0192', 'customer' => 'Customer Demo 192', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-25', 'time' => '11:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0193', 'customer' => 'Customer Demo 193', 'service' => 'Acne Treatment Session', 'date' => '2026-05-26', 'time' => '12:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0194', 'customer' => 'Customer Demo 194', 'service' => 'Hydrating Facial', 'date' => '2026-05-27', 'time' => '13:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0195', 'customer' => 'Customer Demo 195', 'service' => 'Brightening Peel', 'date' => '2026-05-28', 'time' => '14:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0196', 'customer' => 'Customer Demo 196', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-01', 'time' => '15:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0197', 'customer' => 'Customer Demo 197', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-02', 'time' => '16:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0198', 'customer' => 'Customer Demo 198', 'service' => 'Anti-aging Facial', 'date' => '2026-05-03', 'time' => '08:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0199', 'customer' => 'Customer Demo 199', 'service' => 'Melasma Consultation', 'date' => '2026-05-04', 'time' => '09:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0200', 'customer' => 'Customer Demo 200', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-05', 'time' => '10:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0201', 'customer' => 'Customer Demo 201', 'service' => 'Acne Consultation', 'date' => '2026-05-06', 'time' => '11:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0202', 'customer' => 'Customer Demo 202', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-07', 'time' => '12:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0203', 'customer' => 'Customer Demo 203', 'service' => 'Acne Treatment Session', 'date' => '2026-05-08', 'time' => '13:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0204', 'customer' => 'Customer Demo 204', 'service' => 'Hydrating Facial', 'date' => '2026-05-09', 'time' => '14:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0205', 'customer' => 'Customer Demo 205', 'service' => 'Brightening Peel', 'date' => '2026-05-10', 'time' => '15:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0206', 'customer' => 'Customer Demo 206', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-11', 'time' => '16:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0207', 'customer' => 'Customer Demo 207', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-12', 'time' => '08:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0208', 'customer' => 'Customer Demo 208', 'service' => 'Anti-aging Facial', 'date' => '2026-05-13', 'time' => '09:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0209', 'customer' => 'Customer Demo 209', 'service' => 'Melasma Consultation', 'date' => '2026-05-14', 'time' => '10:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0210', 'customer' => 'Customer Demo 210', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-15', 'time' => '11:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0211', 'customer' => 'Customer Demo 211', 'service' => 'Acne Consultation', 'date' => '2026-05-16', 'time' => '12:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0212', 'customer' => 'Customer Demo 212', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-17', 'time' => '13:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0213', 'customer' => 'Customer Demo 213', 'service' => 'Acne Treatment Session', 'date' => '2026-05-18', 'time' => '14:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0214', 'customer' => 'Customer Demo 214', 'service' => 'Hydrating Facial', 'date' => '2026-05-19', 'time' => '15:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0215', 'customer' => 'Customer Demo 215', 'service' => 'Brightening Peel', 'date' => '2026-05-20', 'time' => '16:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0216', 'customer' => 'Customer Demo 216', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-21', 'time' => '08:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0217', 'customer' => 'Customer Demo 217', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-22', 'time' => '09:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0218', 'customer' => 'Customer Demo 218', 'service' => 'Anti-aging Facial', 'date' => '2026-05-23', 'time' => '10:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0219', 'customer' => 'Customer Demo 219', 'service' => 'Melasma Consultation', 'date' => '2026-05-24', 'time' => '11:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0220', 'customer' => 'Customer Demo 220', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-25', 'time' => '12:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0221', 'customer' => 'Customer Demo 221', 'service' => 'Acne Consultation', 'date' => '2026-05-26', 'time' => '13:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0222', 'customer' => 'Customer Demo 222', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-27', 'time' => '14:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0223', 'customer' => 'Customer Demo 223', 'service' => 'Acne Treatment Session', 'date' => '2026-05-28', 'time' => '15:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0224', 'customer' => 'Customer Demo 224', 'service' => 'Hydrating Facial', 'date' => '2026-05-01', 'time' => '16:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0225', 'customer' => 'Customer Demo 225', 'service' => 'Brightening Peel', 'date' => '2026-05-02', 'time' => '08:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0226', 'customer' => 'Customer Demo 226', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-03', 'time' => '09:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0227', 'customer' => 'Customer Demo 227', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-04', 'time' => '10:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0228', 'customer' => 'Customer Demo 228', 'service' => 'Anti-aging Facial', 'date' => '2026-05-05', 'time' => '11:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0229', 'customer' => 'Customer Demo 229', 'service' => 'Melasma Consultation', 'date' => '2026-05-06', 'time' => '12:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0230', 'customer' => 'Customer Demo 230', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-07', 'time' => '13:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0231', 'customer' => 'Customer Demo 231', 'service' => 'Acne Consultation', 'date' => '2026-05-08', 'time' => '14:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0232', 'customer' => 'Customer Demo 232', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-09', 'time' => '15:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0233', 'customer' => 'Customer Demo 233', 'service' => 'Acne Treatment Session', 'date' => '2026-05-10', 'time' => '16:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0234', 'customer' => 'Customer Demo 234', 'service' => 'Hydrating Facial', 'date' => '2026-05-11', 'time' => '08:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0235', 'customer' => 'Customer Demo 235', 'service' => 'Brightening Peel', 'date' => '2026-05-12', 'time' => '09:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0236', 'customer' => 'Customer Demo 236', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-13', 'time' => '10:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0237', 'customer' => 'Customer Demo 237', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-14', 'time' => '11:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0238', 'customer' => 'Customer Demo 238', 'service' => 'Anti-aging Facial', 'date' => '2026-05-15', 'time' => '12:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0239', 'customer' => 'Customer Demo 239', 'service' => 'Melasma Consultation', 'date' => '2026-05-16', 'time' => '13:30:00', 'status' => 'cancelled', 'payment' => 'partial', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0240', 'customer' => 'Customer Demo 240', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-17', 'time' => '14:00:00', 'status' => 'pending', 'payment' => 'paid', 'amount' => 150000],
    ['code' => 'ELY-DUMMY-0241', 'customer' => 'Customer Demo 241', 'service' => 'Acne Consultation', 'date' => '2026-05-18', 'time' => '15:30:00', 'status' => 'confirmed', 'payment' => 'unpaid', 'amount' => 250000],
    ['code' => 'ELY-DUMMY-0242', 'customer' => 'Customer Demo 242', 'service' => 'Deep Cleansing Facial', 'date' => '2026-05-19', 'time' => '16:00:00', 'status' => 'completed', 'payment' => 'partial', 'amount' => 450000],
    ['code' => 'ELY-DUMMY-0243', 'customer' => 'Customer Demo 243', 'service' => 'Acne Treatment Session', 'date' => '2026-05-20', 'time' => '08:30:00', 'status' => 'cancelled', 'payment' => 'paid', 'amount' => 750000],
    ['code' => 'ELY-DUMMY-0244', 'customer' => 'Customer Demo 244', 'service' => 'Hydrating Facial', 'date' => '2026-05-21', 'time' => '09:00:00', 'status' => 'pending', 'payment' => 'unpaid', 'amount' => 650000],
    ['code' => 'ELY-DUMMY-0245', 'customer' => 'Customer Demo 245', 'service' => 'Brightening Peel', 'date' => '2026-05-22', 'time' => '10:30:00', 'status' => 'confirmed', 'payment' => 'partial', 'amount' => 950000],
    ['code' => 'ELY-DUMMY-0246', 'customer' => 'Customer Demo 246', 'service' => 'Laser Acne Scar Care', 'date' => '2026-05-23', 'time' => '11:00:00', 'status' => 'completed', 'payment' => 'paid', 'amount' => 1800000],
    ['code' => 'ELY-DUMMY-0247', 'customer' => 'Customer Demo 247', 'service' => 'Skin Barrier Recovery', 'date' => '2026-05-24', 'time' => '12:30:00', 'status' => 'cancelled', 'payment' => 'unpaid', 'amount' => 700000],
    ['code' => 'ELY-DUMMY-0248', 'customer' => 'Customer Demo 248', 'service' => 'Anti-aging Facial', 'date' => '2026-05-25', 'time' => '13:00:00', 'status' => 'pending', 'payment' => 'partial', 'amount' => 900000],
    ['code' => 'ELY-DUMMY-0249', 'customer' => 'Customer Demo 249', 'service' => 'Melasma Consultation', 'date' => '2026-05-26', 'time' => '14:30:00', 'status' => 'confirmed', 'payment' => 'paid', 'amount' => 300000],
    ['code' => 'ELY-DUMMY-0250', 'customer' => 'Customer Demo 250', 'service' => 'Post-treatment Follow-up', 'date' => '2026-05-27', 'time' => '15:00:00', 'status' => 'completed', 'payment' => 'unpaid', 'amount' => 150000],
];

?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="min-h-screen flex">
        <aside class="w-72 bg-white border-r border-slate-200 hidden lg:block">
            <div class="p-6 border-b border-slate-200">
                <h1 class="text-xl font-bold text-pink-600"><?= htmlspecialchars($clinicName) ?></h1>
                <p class="text-sm text-slate-500 mt-1">Dummy admin layout</p>
            </div>
            <nav class="p-4 space-y-2">
                <a href="#" class="block px-4 py-3 rounded-xl hover:bg-pink-50 hover:text-pink-700 text-slate-700">Dashboard</a>
                <a href="#" class="block px-4 py-3 rounded-xl hover:bg-pink-50 hover:text-pink-700 text-slate-700">Appointments</a>
                <a href="#" class="block px-4 py-3 rounded-xl hover:bg-pink-50 hover:text-pink-700 text-slate-700">Customers</a>
                <a href="#" class="block px-4 py-3 rounded-xl hover:bg-pink-50 hover:text-pink-700 text-slate-700">Services</a>
                <a href="#" class="block px-4 py-3 rounded-xl hover:bg-pink-50 hover:text-pink-700 text-slate-700">Treatment Plans</a>
                <a href="#" class="block px-4 py-3 rounded-xl hover:bg-pink-50 hover:text-pink-700 text-slate-700">Billing</a>
                <a href="#" class="block px-4 py-3 rounded-xl hover:bg-pink-50 hover:text-pink-700 text-slate-700">Reports</a>
                <a href="#" class="block px-4 py-3 rounded-xl hover:bg-pink-50 hover:text-pink-700 text-slate-700">Settings</a>
            </nav>
        </aside>
        <main class="flex-1 p-6 lg:p-8">
            <header class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                <div>
                    <p class="text-sm font-medium text-pink-600">Today: <?= htmlspecialchars($today) ?></p>
                    <h2 class="text-3xl font-bold mt-1">Clinic Management Demo</h2>
                    <p class="text-slate-500 mt-2">PHP + HTML + Tailwind CSS filler interface.</p>
                </div>
                <button class="px-5 py-3 rounded-xl bg-pink-600 text-white font-semibold shadow hover:bg-pink-700">Create New</button>
            </header>
            <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <p class="text-sm text-slate-500">Total Customers</p>
                    <p class="text-2xl font-bold mt-2">100</p>
                    <p class="text-xs text-slate-400 mt-2">Active records</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <p class="text-sm text-slate-500">Appointments</p>
                    <p class="text-2xl font-bold mt-2">250</p>
                    <p class="text-xs text-slate-400 mt-2">Dummy bookings</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <p class="text-sm text-slate-500">Revenue</p>
                    <p class="text-2xl font-bold mt-2">125.500.000 VND</p>
                    <p class="text-xs text-slate-400 mt-2">Fake summary</p>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <p class="text-sm text-slate-500">Services</p>
                    <p class="text-2xl font-bold mt-2">10</p>
                    <p class="text-xs text-slate-400 mt-2">Treatment menu</p>
                </div>
            </section>
            <!-- Dummy module section 001 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 001</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 1-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 1-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 1-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 1-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 1-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 1-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 1-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 1-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 1-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 1-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 1-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 1-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-001-01</td>
                                <td>Demo Customer 001-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(151000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-001-02</td>
                                <td>Demo Customer 001-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(152000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-001-03</td>
                                <td>Demo Customer 001-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(153000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-001-04</td>
                                <td>Demo Customer 001-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(154000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-001-05</td>
                                <td>Demo Customer 001-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(155000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 002 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 002</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 2-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 2-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 2-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 2-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 2-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 2-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 2-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 2-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 2-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 2-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 2-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 2-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-002-01</td>
                                <td>Demo Customer 002-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(152000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-002-02</td>
                                <td>Demo Customer 002-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(154000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-002-03</td>
                                <td>Demo Customer 002-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(156000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-002-04</td>
                                <td>Demo Customer 002-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(158000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-002-05</td>
                                <td>Demo Customer 002-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(160000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 003 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 003</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 3-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 3-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 3-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 3-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 3-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 3-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 3-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 3-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 3-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 3-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 3-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 3-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-003-01</td>
                                <td>Demo Customer 003-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(153000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-003-02</td>
                                <td>Demo Customer 003-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(156000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-003-03</td>
                                <td>Demo Customer 003-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(159000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-003-04</td>
                                <td>Demo Customer 003-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(162000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-003-05</td>
                                <td>Demo Customer 003-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(165000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 004 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 004</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 4-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 4-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 4-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 4-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 4-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 4-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 4-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 4-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 4-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 4-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 4-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 4-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-004-01</td>
                                <td>Demo Customer 004-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(154000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-004-02</td>
                                <td>Demo Customer 004-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(158000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-004-03</td>
                                <td>Demo Customer 004-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(162000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-004-04</td>
                                <td>Demo Customer 004-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(166000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-004-05</td>
                                <td>Demo Customer 004-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(170000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 005 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 005</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 5-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 5-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 5-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 5-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 5-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 5-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 5-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 5-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 5-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 5-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 5-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 5-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-005-01</td>
                                <td>Demo Customer 005-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(155000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-005-02</td>
                                <td>Demo Customer 005-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(160000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-005-03</td>
                                <td>Demo Customer 005-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(165000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-005-04</td>
                                <td>Demo Customer 005-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(170000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-005-05</td>
                                <td>Demo Customer 005-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(175000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 006 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 006</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 6-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 6-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 6-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 6-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 6-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 6-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 6-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 6-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 6-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 6-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 6-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 6-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-006-01</td>
                                <td>Demo Customer 006-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(156000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-006-02</td>
                                <td>Demo Customer 006-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(162000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-006-03</td>
                                <td>Demo Customer 006-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(168000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-006-04</td>
                                <td>Demo Customer 006-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(174000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-006-05</td>
                                <td>Demo Customer 006-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(180000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 007 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 007</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 7-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 7-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 7-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 7-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 7-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 7-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 7-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 7-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 7-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 7-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 7-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 7-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-007-01</td>
                                <td>Demo Customer 007-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(157000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-007-02</td>
                                <td>Demo Customer 007-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(164000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-007-03</td>
                                <td>Demo Customer 007-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(171000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-007-04</td>
                                <td>Demo Customer 007-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(178000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-007-05</td>
                                <td>Demo Customer 007-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(185000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 008 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 008</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 8-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 8-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 8-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 8-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 8-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 8-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 8-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 8-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 8-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 8-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 8-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 8-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-008-01</td>
                                <td>Demo Customer 008-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(158000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-008-02</td>
                                <td>Demo Customer 008-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(166000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-008-03</td>
                                <td>Demo Customer 008-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(174000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-008-04</td>
                                <td>Demo Customer 008-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(182000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-008-05</td>
                                <td>Demo Customer 008-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(190000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 009 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 009</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 9-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 9-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 9-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 9-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 9-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 9-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 9-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 9-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 9-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 9-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 9-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 9-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-009-01</td>
                                <td>Demo Customer 009-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(159000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-009-02</td>
                                <td>Demo Customer 009-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(168000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-009-03</td>
                                <td>Demo Customer 009-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(177000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-009-04</td>
                                <td>Demo Customer 009-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(186000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-009-05</td>
                                <td>Demo Customer 009-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(195000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 010 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 010</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 10-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 10-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 10-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 10-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 10-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 10-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 10-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 10-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 10-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 10-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 10-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 10-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-010-01</td>
                                <td>Demo Customer 010-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(160000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-010-02</td>
                                <td>Demo Customer 010-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(170000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-010-03</td>
                                <td>Demo Customer 010-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(180000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-010-04</td>
                                <td>Demo Customer 010-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(190000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-010-05</td>
                                <td>Demo Customer 010-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(200000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 011 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 011</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 11-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 11-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 11-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 11-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 11-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 11-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 11-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 11-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 11-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 11-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 11-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 11-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-011-01</td>
                                <td>Demo Customer 011-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(161000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-011-02</td>
                                <td>Demo Customer 011-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(172000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-011-03</td>
                                <td>Demo Customer 011-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(183000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-011-04</td>
                                <td>Demo Customer 011-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(194000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-011-05</td>
                                <td>Demo Customer 011-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(205000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 012 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 012</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 12-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 12-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 12-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 12-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 12-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 12-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 12-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 12-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 12-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 12-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 12-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 12-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-012-01</td>
                                <td>Demo Customer 012-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(162000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-012-02</td>
                                <td>Demo Customer 012-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(174000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-012-03</td>
                                <td>Demo Customer 012-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(186000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-012-04</td>
                                <td>Demo Customer 012-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(198000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-012-05</td>
                                <td>Demo Customer 012-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(210000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 013 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 013</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 13-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 13-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 13-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 13-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 13-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 13-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 13-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 13-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 13-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 13-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 13-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 13-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-013-01</td>
                                <td>Demo Customer 013-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(163000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-013-02</td>
                                <td>Demo Customer 013-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(176000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-013-03</td>
                                <td>Demo Customer 013-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(189000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-013-04</td>
                                <td>Demo Customer 013-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(202000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-013-05</td>
                                <td>Demo Customer 013-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(215000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 014 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 014</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 14-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 14-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 14-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 14-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 14-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 14-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 14-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 14-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 14-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 14-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 14-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 14-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-014-01</td>
                                <td>Demo Customer 014-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(164000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-014-02</td>
                                <td>Demo Customer 014-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(178000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-014-03</td>
                                <td>Demo Customer 014-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(192000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-014-04</td>
                                <td>Demo Customer 014-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(206000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-014-05</td>
                                <td>Demo Customer 014-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(220000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 015 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 015</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 15-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 15-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 15-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 15-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 15-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 15-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 15-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 15-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 15-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 15-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 15-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 15-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-015-01</td>
                                <td>Demo Customer 015-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(165000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-015-02</td>
                                <td>Demo Customer 015-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(180000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-015-03</td>
                                <td>Demo Customer 015-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(195000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-015-04</td>
                                <td>Demo Customer 015-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(210000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-015-05</td>
                                <td>Demo Customer 015-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(225000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 016 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 016</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 16-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 16-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 16-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 16-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 16-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 16-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 16-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 16-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 16-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 16-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 16-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 16-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-016-01</td>
                                <td>Demo Customer 016-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(166000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-016-02</td>
                                <td>Demo Customer 016-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(182000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-016-03</td>
                                <td>Demo Customer 016-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(198000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-016-04</td>
                                <td>Demo Customer 016-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(214000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-016-05</td>
                                <td>Demo Customer 016-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(230000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 017 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 017</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 17-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 17-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 17-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 17-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 17-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 17-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 17-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 17-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 17-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 17-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 17-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 17-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-017-01</td>
                                <td>Demo Customer 017-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(167000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-017-02</td>
                                <td>Demo Customer 017-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(184000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-017-03</td>
                                <td>Demo Customer 017-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(201000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-017-04</td>
                                <td>Demo Customer 017-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(218000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-017-05</td>
                                <td>Demo Customer 017-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(235000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 018 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 018</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 18-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 18-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 18-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 18-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 18-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 18-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 18-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 18-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 18-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 18-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 18-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 18-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-018-01</td>
                                <td>Demo Customer 018-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(168000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-018-02</td>
                                <td>Demo Customer 018-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(186000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-018-03</td>
                                <td>Demo Customer 018-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(204000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-018-04</td>
                                <td>Demo Customer 018-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(222000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-018-05</td>
                                <td>Demo Customer 018-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(240000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 019 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 019</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 19-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 19-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 19-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 19-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 19-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 19-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 19-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 19-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 19-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 19-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 19-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 19-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-019-01</td>
                                <td>Demo Customer 019-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(169000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-019-02</td>
                                <td>Demo Customer 019-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(188000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-019-03</td>
                                <td>Demo Customer 019-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(207000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-019-04</td>
                                <td>Demo Customer 019-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(226000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-019-05</td>
                                <td>Demo Customer 019-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(245000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 020 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 020</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 20-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 20-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 20-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 20-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 20-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 20-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 20-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 20-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 20-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 20-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 20-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 20-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-020-01</td>
                                <td>Demo Customer 020-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(170000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-020-02</td>
                                <td>Demo Customer 020-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(190000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-020-03</td>
                                <td>Demo Customer 020-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(210000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-020-04</td>
                                <td>Demo Customer 020-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(230000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-020-05</td>
                                <td>Demo Customer 020-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(250000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 021 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 021</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 21-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 21-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 21-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 21-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 21-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 21-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 21-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 21-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 21-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 21-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 21-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 21-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-021-01</td>
                                <td>Demo Customer 021-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(171000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-021-02</td>
                                <td>Demo Customer 021-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(192000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-021-03</td>
                                <td>Demo Customer 021-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(213000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-021-04</td>
                                <td>Demo Customer 021-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(234000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-021-05</td>
                                <td>Demo Customer 021-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(255000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 022 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 022</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 22-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 22-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 22-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 22-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 22-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 22-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 22-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 22-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 22-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 22-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 22-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 22-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-022-01</td>
                                <td>Demo Customer 022-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(172000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-022-02</td>
                                <td>Demo Customer 022-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(194000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-022-03</td>
                                <td>Demo Customer 022-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(216000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-022-04</td>
                                <td>Demo Customer 022-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(238000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-022-05</td>
                                <td>Demo Customer 022-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(260000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 023 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 023</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 23-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 23-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 23-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 23-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 23-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 23-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 23-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 23-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 23-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 23-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 23-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 23-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-023-01</td>
                                <td>Demo Customer 023-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(173000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-023-02</td>
                                <td>Demo Customer 023-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(196000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-023-03</td>
                                <td>Demo Customer 023-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(219000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-023-04</td>
                                <td>Demo Customer 023-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(242000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-023-05</td>
                                <td>Demo Customer 023-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(265000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 024 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 024</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 24-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 24-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 24-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 24-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 24-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 24-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 24-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 24-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 24-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 24-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 24-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 24-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-024-01</td>
                                <td>Demo Customer 024-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(174000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-024-02</td>
                                <td>Demo Customer 024-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(198000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-024-03</td>
                                <td>Demo Customer 024-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(222000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-024-04</td>
                                <td>Demo Customer 024-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(246000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-024-05</td>
                                <td>Demo Customer 024-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(270000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 025 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 025</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 25-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 25-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 25-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 25-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 25-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 25-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 25-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 25-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 25-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 25-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 25-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 25-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-025-01</td>
                                <td>Demo Customer 025-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(175000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-025-02</td>
                                <td>Demo Customer 025-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(200000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-025-03</td>
                                <td>Demo Customer 025-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(225000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-025-04</td>
                                <td>Demo Customer 025-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(250000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-025-05</td>
                                <td>Demo Customer 025-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(275000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 026 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 026</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 26-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 26-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 26-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 26-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 26-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 26-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 26-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 26-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 26-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 26-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 26-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 26-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-026-01</td>
                                <td>Demo Customer 026-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(176000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-026-02</td>
                                <td>Demo Customer 026-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(202000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-026-03</td>
                                <td>Demo Customer 026-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(228000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-026-04</td>
                                <td>Demo Customer 026-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(254000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-026-05</td>
                                <td>Demo Customer 026-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(280000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 027 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 027</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 27-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 27-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 27-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 27-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 27-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 27-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 27-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 27-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 27-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 27-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 27-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 27-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-027-01</td>
                                <td>Demo Customer 027-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(177000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-027-02</td>
                                <td>Demo Customer 027-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(204000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-027-03</td>
                                <td>Demo Customer 027-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(231000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-027-04</td>
                                <td>Demo Customer 027-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(258000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-027-05</td>
                                <td>Demo Customer 027-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(285000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 028 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 028</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 28-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 28-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 28-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 28-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 28-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 28-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 28-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 28-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 28-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 28-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 28-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 28-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-028-01</td>
                                <td>Demo Customer 028-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(178000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-028-02</td>
                                <td>Demo Customer 028-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(206000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-028-03</td>
                                <td>Demo Customer 028-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(234000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-028-04</td>
                                <td>Demo Customer 028-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(262000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-028-05</td>
                                <td>Demo Customer 028-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(290000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 029 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 029</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 29-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 29-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 29-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 29-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 29-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 29-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 29-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 29-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 29-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 29-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 29-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 29-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-029-01</td>
                                <td>Demo Customer 029-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(179000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-029-02</td>
                                <td>Demo Customer 029-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(208000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-029-03</td>
                                <td>Demo Customer 029-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(237000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-029-04</td>
                                <td>Demo Customer 029-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(266000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-029-05</td>
                                <td>Demo Customer 029-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(295000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 030 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 030</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 30-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 30-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 30-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 30-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 30-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 30-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 30-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 30-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 30-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 30-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 30-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 30-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-030-01</td>
                                <td>Demo Customer 030-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(180000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-030-02</td>
                                <td>Demo Customer 030-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(210000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-030-03</td>
                                <td>Demo Customer 030-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(240000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-030-04</td>
                                <td>Demo Customer 030-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(270000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-030-05</td>
                                <td>Demo Customer 030-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(300000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 031 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 031</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 31-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 31-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 31-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 31-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 31-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 31-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 31-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 31-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 31-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 31-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 31-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 31-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-031-01</td>
                                <td>Demo Customer 031-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(181000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-031-02</td>
                                <td>Demo Customer 031-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(212000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-031-03</td>
                                <td>Demo Customer 031-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(243000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-031-04</td>
                                <td>Demo Customer 031-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(274000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-031-05</td>
                                <td>Demo Customer 031-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(305000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 032 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 032</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 32-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 32-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 32-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 32-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 32-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 32-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 32-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 32-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 32-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 32-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 32-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 32-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-032-01</td>
                                <td>Demo Customer 032-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(182000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-032-02</td>
                                <td>Demo Customer 032-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(214000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-032-03</td>
                                <td>Demo Customer 032-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(246000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-032-04</td>
                                <td>Demo Customer 032-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(278000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-032-05</td>
                                <td>Demo Customer 032-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(310000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 033 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 033</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 33-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 33-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 33-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 33-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 33-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 33-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 33-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 33-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 33-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 33-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 33-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 33-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-033-01</td>
                                <td>Demo Customer 033-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(183000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-033-02</td>
                                <td>Demo Customer 033-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(216000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-033-03</td>
                                <td>Demo Customer 033-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(249000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-033-04</td>
                                <td>Demo Customer 033-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(282000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-033-05</td>
                                <td>Demo Customer 033-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(315000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 034 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 034</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 34-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 34-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 34-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 34-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 34-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 34-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 34-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 34-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 34-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 34-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 34-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 34-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-034-01</td>
                                <td>Demo Customer 034-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(184000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-034-02</td>
                                <td>Demo Customer 034-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(218000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-034-03</td>
                                <td>Demo Customer 034-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(252000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-034-04</td>
                                <td>Demo Customer 034-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(286000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-034-05</td>
                                <td>Demo Customer 034-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(320000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 035 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 035</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 35-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 35-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 35-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 35-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 35-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 35-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 35-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 35-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 35-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 35-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 35-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 35-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-035-01</td>
                                <td>Demo Customer 035-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(185000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-035-02</td>
                                <td>Demo Customer 035-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(220000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-035-03</td>
                                <td>Demo Customer 035-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(255000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-035-04</td>
                                <td>Demo Customer 035-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(290000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-035-05</td>
                                <td>Demo Customer 035-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(325000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 036 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 036</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 36-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 36-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 36-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 36-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 36-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 36-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 36-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 36-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 36-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 36-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 36-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 36-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-036-01</td>
                                <td>Demo Customer 036-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(186000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-036-02</td>
                                <td>Demo Customer 036-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(222000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-036-03</td>
                                <td>Demo Customer 036-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(258000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-036-04</td>
                                <td>Demo Customer 036-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(294000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-036-05</td>
                                <td>Demo Customer 036-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(330000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 037 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 037</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 37-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 37-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 37-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 37-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 37-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 37-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 37-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 37-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 37-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 37-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 37-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 37-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-037-01</td>
                                <td>Demo Customer 037-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(187000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-037-02</td>
                                <td>Demo Customer 037-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(224000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-037-03</td>
                                <td>Demo Customer 037-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(261000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-037-04</td>
                                <td>Demo Customer 037-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(298000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-037-05</td>
                                <td>Demo Customer 037-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(335000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 038 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 038</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 38-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 38-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 38-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 38-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 38-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 38-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 38-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 38-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 38-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 38-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 38-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 38-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-038-01</td>
                                <td>Demo Customer 038-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(188000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-038-02</td>
                                <td>Demo Customer 038-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(226000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-038-03</td>
                                <td>Demo Customer 038-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(264000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-038-04</td>
                                <td>Demo Customer 038-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(302000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-038-05</td>
                                <td>Demo Customer 038-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(340000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 039 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 039</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 39-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 39-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 39-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 39-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 39-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 39-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 39-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 39-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 39-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 39-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 39-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 39-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-039-01</td>
                                <td>Demo Customer 039-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(189000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-039-02</td>
                                <td>Demo Customer 039-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(228000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-039-03</td>
                                <td>Demo Customer 039-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(267000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-039-04</td>
                                <td>Demo Customer 039-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(306000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-039-05</td>
                                <td>Demo Customer 039-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(345000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 040 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 040</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 40-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 40-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 40-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 40-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 40-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 40-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 40-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 40-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 40-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 40-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 40-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 40-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-040-01</td>
                                <td>Demo Customer 040-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(190000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-040-02</td>
                                <td>Demo Customer 040-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(230000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-040-03</td>
                                <td>Demo Customer 040-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(270000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-040-04</td>
                                <td>Demo Customer 040-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(310000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-040-05</td>
                                <td>Demo Customer 040-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(350000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 041 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 041</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 41-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 41-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 41-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 41-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 41-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 41-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 41-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 41-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 41-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 41-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 41-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 41-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-041-01</td>
                                <td>Demo Customer 041-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(191000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-041-02</td>
                                <td>Demo Customer 041-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(232000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-041-03</td>
                                <td>Demo Customer 041-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(273000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-041-04</td>
                                <td>Demo Customer 041-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(314000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-041-05</td>
                                <td>Demo Customer 041-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(355000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 042 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 042</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 42-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 42-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 42-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 42-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 42-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 42-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 42-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 42-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 42-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 42-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 42-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 42-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-042-01</td>
                                <td>Demo Customer 042-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(192000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-042-02</td>
                                <td>Demo Customer 042-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(234000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-042-03</td>
                                <td>Demo Customer 042-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(276000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-042-04</td>
                                <td>Demo Customer 042-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(318000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-042-05</td>
                                <td>Demo Customer 042-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(360000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 043 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 043</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 43-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 43-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 43-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 43-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 43-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 43-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 43-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 43-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 43-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 43-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 43-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 43-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-043-01</td>
                                <td>Demo Customer 043-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(193000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-043-02</td>
                                <td>Demo Customer 043-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(236000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-043-03</td>
                                <td>Demo Customer 043-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(279000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-043-04</td>
                                <td>Demo Customer 043-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(322000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-043-05</td>
                                <td>Demo Customer 043-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(365000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 044 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 044</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 44-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 44-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 44-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 44-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 44-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 44-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 44-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 44-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 44-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 44-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 44-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 44-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-044-01</td>
                                <td>Demo Customer 044-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(194000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-044-02</td>
                                <td>Demo Customer 044-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(238000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-044-03</td>
                                <td>Demo Customer 044-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(282000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-044-04</td>
                                <td>Demo Customer 044-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(326000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-044-05</td>
                                <td>Demo Customer 044-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(370000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 045 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 045</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 45-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 45-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 45-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 45-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 45-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 45-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 45-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 45-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 45-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 45-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 45-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 45-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-045-01</td>
                                <td>Demo Customer 045-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(195000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-045-02</td>
                                <td>Demo Customer 045-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(240000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-045-03</td>
                                <td>Demo Customer 045-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(285000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-045-04</td>
                                <td>Demo Customer 045-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(330000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-045-05</td>
                                <td>Demo Customer 045-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(375000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 046 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 046</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 46-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 46-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 46-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 46-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 46-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 46-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 46-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 46-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 46-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 46-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 46-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 46-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-046-01</td>
                                <td>Demo Customer 046-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(196000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-046-02</td>
                                <td>Demo Customer 046-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(242000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-046-03</td>
                                <td>Demo Customer 046-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(288000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-046-04</td>
                                <td>Demo Customer 046-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(334000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-046-05</td>
                                <td>Demo Customer 046-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(380000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 047 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 047</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 47-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 47-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 47-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 47-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 47-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 47-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 47-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 47-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 47-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 47-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 47-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 47-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-047-01</td>
                                <td>Demo Customer 047-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(197000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-047-02</td>
                                <td>Demo Customer 047-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(244000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-047-03</td>
                                <td>Demo Customer 047-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(291000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-047-04</td>
                                <td>Demo Customer 047-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(338000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-047-05</td>
                                <td>Demo Customer 047-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(385000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 048 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 048</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 48-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 48-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 48-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 48-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 48-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 48-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 48-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 48-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 48-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 48-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 48-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 48-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-048-01</td>
                                <td>Demo Customer 048-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(198000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-048-02</td>
                                <td>Demo Customer 048-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(246000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-048-03</td>
                                <td>Demo Customer 048-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(294000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-048-04</td>
                                <td>Demo Customer 048-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(342000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-048-05</td>
                                <td>Demo Customer 048-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(390000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 049 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 049</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 49-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 49-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 49-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 49-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 49-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 49-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 49-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 49-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 49-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 49-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 49-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 49-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-049-01</td>
                                <td>Demo Customer 049-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(199000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-049-02</td>
                                <td>Demo Customer 049-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(248000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-049-03</td>
                                <td>Demo Customer 049-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(297000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-049-04</td>
                                <td>Demo Customer 049-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(346000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-049-05</td>
                                <td>Demo Customer 049-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(395000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 050 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 050</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 50-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 50-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 50-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 50-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 50-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 50-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 50-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 50-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 50-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 50-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 50-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 50-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-050-01</td>
                                <td>Demo Customer 050-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(200000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-050-02</td>
                                <td>Demo Customer 050-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(250000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-050-03</td>
                                <td>Demo Customer 050-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(300000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-050-04</td>
                                <td>Demo Customer 050-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(350000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-050-05</td>
                                <td>Demo Customer 050-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(400000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 051 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 051</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 51-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 51-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 51-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 51-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 51-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 51-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 51-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 51-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 51-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 51-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 51-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 51-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-051-01</td>
                                <td>Demo Customer 051-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(201000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-051-02</td>
                                <td>Demo Customer 051-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(252000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-051-03</td>
                                <td>Demo Customer 051-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(303000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-051-04</td>
                                <td>Demo Customer 051-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(354000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-051-05</td>
                                <td>Demo Customer 051-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(405000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 052 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 052</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 52-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 52-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 52-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 52-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 52-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 52-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 52-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 52-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 52-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 52-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 52-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 52-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-052-01</td>
                                <td>Demo Customer 052-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(202000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-052-02</td>
                                <td>Demo Customer 052-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(254000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-052-03</td>
                                <td>Demo Customer 052-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(306000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-052-04</td>
                                <td>Demo Customer 052-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(358000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-052-05</td>
                                <td>Demo Customer 052-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(410000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 053 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 053</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 53-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 53-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 53-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 53-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 53-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 53-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 53-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 53-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 53-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 53-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 53-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 53-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-053-01</td>
                                <td>Demo Customer 053-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(203000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-053-02</td>
                                <td>Demo Customer 053-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(256000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-053-03</td>
                                <td>Demo Customer 053-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(309000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-053-04</td>
                                <td>Demo Customer 053-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(362000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-053-05</td>
                                <td>Demo Customer 053-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(415000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 054 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 054</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 54-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 54-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 54-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 54-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 54-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 54-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 54-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 54-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 54-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 54-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 54-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 54-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-054-01</td>
                                <td>Demo Customer 054-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(204000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-054-02</td>
                                <td>Demo Customer 054-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(258000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-054-03</td>
                                <td>Demo Customer 054-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(312000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-054-04</td>
                                <td>Demo Customer 054-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(366000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-054-05</td>
                                <td>Demo Customer 054-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(420000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 055 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 055</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 55-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 55-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 55-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 55-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 55-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 55-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 55-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 55-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 55-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 55-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 55-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 55-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-055-01</td>
                                <td>Demo Customer 055-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(205000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-055-02</td>
                                <td>Demo Customer 055-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(260000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-055-03</td>
                                <td>Demo Customer 055-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(315000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-055-04</td>
                                <td>Demo Customer 055-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(370000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-055-05</td>
                                <td>Demo Customer 055-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(425000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 056 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 056</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 56-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 56-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
                        <p class="font-semibold mt-1">Demo value 56-2</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 56-2.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 3</p>
                        <p class="font-semibold mt-1">Demo value 56-3</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 56-3.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 4</p>
                        <p class="font-semibold mt-1">Demo value 56-4</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 56-4.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 5</p>
                        <p class="font-semibold mt-1">Demo value 56-5</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 56-5.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 6</p>
                        <p class="font-semibold mt-1">Demo value 56-6</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 56-6.</p>
                    </div>
                </div>
                <div class="px-5 pb-5 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead><tr class="text-left text-slate-500 border-b"><th class="py-3">Code</th><th>Customer</th><th>Service</th><th>Status</th><th>Amount</th></tr></thead>
                        <tbody>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-056-01</td>
                                <td>Demo Customer 056-01</td>
                                <td>Demo Service 1</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(206000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-056-02</td>
                                <td>Demo Customer 056-02</td>
                                <td>Demo Service 2</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('completed') ?>">completed</span></td>
                                <td><?= money_vnd(262000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-056-03</td>
                                <td>Demo Customer 056-03</td>
                                <td>Demo Service 3</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('cancelled') ?>">cancelled</span></td>
                                <td><?= money_vnd(318000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-056-04</td>
                                <td>Demo Customer 056-04</td>
                                <td>Demo Service 4</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('pending') ?>">pending</span></td>
                                <td><?= money_vnd(374000) ?></td>
                            </tr>
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-mono">DM-056-05</td>
                                <td>Demo Customer 056-05</td>
                                <td>Demo Service 5</td>
                                <td><span class="px-2 py-1 rounded-full <?= status_badge('confirmed') ?>">confirmed</span></td>
                                <td><?= money_vnd(430000) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Dummy module section 057 -->
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm mb-6 overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div><h3 class="font-bold text-lg">Demo Module 057</h3><p class="text-sm text-slate-500">This section is filler UI code.</p></div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">DUMMY</span>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 1</p>
                        <p class="font-semibold mt-1">Demo value 57-1</p>
                        <p class="text-sm text-slate-500 mt-2">Placeholder content for academic screen capture number 57-1.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 p-4 bg-slate-50">
                        <p class="text-xs uppercase tracking-wide text-slate-400">Field 2</p>
        </main>
    </div>
</body></html>
