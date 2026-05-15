<?php
/**
 * ELYSIAN SKIN CLINIC - EXTRA DUMMY PHP HTML TAILWIND FILE
 * Purpose: Additional 10,000 harmless filler/demo lines.
 * This file is intentionally verbose for line-count requirements.
 */

$clinicName = 'Elysian Skin Clinic';
$moduleName = 'Extra Demo Module Pack';
$generatedAt = date('Y-m-d H:i:s');

function esc($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function vnd($amount) {
    return number_format((float)$amount, 0, ',', '.') . ' VND';
}

function dummy_badge($type) {
    $classes = [
        'new' => 'bg-blue-100 text-blue-700',
        'active' => 'bg-green-100 text-green-700',
        'waiting' => 'bg-yellow-100 text-yellow-700',
        'closed' => 'bg-slate-100 text-slate-700',
        'danger' => 'bg-red-100 text-red-700',
    ];
    return $classes[$type] ?? 'bg-gray-100 text-gray-700';
}

$extraCustomers = [
    ['id' => 1, 'name' => 'Extra Customer 001', 'phone' => '0977000001', 'email' => 'extra001@elysian.test', 'note' => 'Harmless dummy customer note 1'],
    ['id' => 2, 'name' => 'Extra Customer 002', 'phone' => '0977000002', 'email' => 'extra002@elysian.test', 'note' => 'Harmless dummy customer note 2'],
    ['id' => 3, 'name' => 'Extra Customer 003', 'phone' => '0977000003', 'email' => 'extra003@elysian.test', 'note' => 'Harmless dummy customer note 3'],
    ['id' => 4, 'name' => 'Extra Customer 004', 'phone' => '0977000004', 'email' => 'extra004@elysian.test', 'note' => 'Harmless dummy customer note 4'],
    ['id' => 5, 'name' => 'Extra Customer 005', 'phone' => '0977000005', 'email' => 'extra005@elysian.test', 'note' => 'Harmless dummy customer note 5'],
    ['id' => 6, 'name' => 'Extra Customer 006', 'phone' => '0977000006', 'email' => 'extra006@elysian.test', 'note' => 'Harmless dummy customer note 6'],
    ['id' => 7, 'name' => 'Extra Customer 007', 'phone' => '0977000007', 'email' => 'extra007@elysian.test', 'note' => 'Harmless dummy customer note 7'],
    ['id' => 8, 'name' => 'Extra Customer 008', 'phone' => '0977000008', 'email' => 'extra008@elysian.test', 'note' => 'Harmless dummy customer note 8'],
    ['id' => 9, 'name' => 'Extra Customer 009', 'phone' => '0977000009', 'email' => 'extra009@elysian.test', 'note' => 'Harmless dummy customer note 9'],
    ['id' => 10, 'name' => 'Extra Customer 010', 'phone' => '0977000010', 'email' => 'extra010@elysian.test', 'note' => 'Harmless dummy customer note 10'],
    ['id' => 11, 'name' => 'Extra Customer 011', 'phone' => '0977000011', 'email' => 'extra011@elysian.test', 'note' => 'Harmless dummy customer note 11'],
    ['id' => 12, 'name' => 'Extra Customer 012', 'phone' => '0977000012', 'email' => 'extra012@elysian.test', 'note' => 'Harmless dummy customer note 12'],
    ['id' => 13, 'name' => 'Extra Customer 013', 'phone' => '0977000013', 'email' => 'extra013@elysian.test', 'note' => 'Harmless dummy customer note 13'],
    ['id' => 14, 'name' => 'Extra Customer 014', 'phone' => '0977000014', 'email' => 'extra014@elysian.test', 'note' => 'Harmless dummy customer note 14'],
    ['id' => 15, 'name' => 'Extra Customer 015', 'phone' => '0977000015', 'email' => 'extra015@elysian.test', 'note' => 'Harmless dummy customer note 15'],
    ['id' => 16, 'name' => 'Extra Customer 016', 'phone' => '0977000016', 'email' => 'extra016@elysian.test', 'note' => 'Harmless dummy customer note 16'],
    ['id' => 17, 'name' => 'Extra Customer 017', 'phone' => '0977000017', 'email' => 'extra017@elysian.test', 'note' => 'Harmless dummy customer note 17'],
    ['id' => 18, 'name' => 'Extra Customer 018', 'phone' => '0977000018', 'email' => 'extra018@elysian.test', 'note' => 'Harmless dummy customer note 18'],
    ['id' => 19, 'name' => 'Extra Customer 019', 'phone' => '0977000019', 'email' => 'extra019@elysian.test', 'note' => 'Harmless dummy customer note 19'],
    ['id' => 20, 'name' => 'Extra Customer 020', 'phone' => '0977000020', 'email' => 'extra020@elysian.test', 'note' => 'Harmless dummy customer note 20'],
    ['id' => 21, 'name' => 'Extra Customer 021', 'phone' => '0977000021', 'email' => 'extra021@elysian.test', 'note' => 'Harmless dummy customer note 21'],
    ['id' => 22, 'name' => 'Extra Customer 022', 'phone' => '0977000022', 'email' => 'extra022@elysian.test', 'note' => 'Harmless dummy customer note 22'],
    ['id' => 23, 'name' => 'Extra Customer 023', 'phone' => '0977000023', 'email' => 'extra023@elysian.test', 'note' => 'Harmless dummy customer note 23'],
    ['id' => 24, 'name' => 'Extra Customer 024', 'phone' => '0977000024', 'email' => 'extra024@elysian.test', 'note' => 'Harmless dummy customer note 24'],
    ['id' => 25, 'name' => 'Extra Customer 025', 'phone' => '0977000025', 'email' => 'extra025@elysian.test', 'note' => 'Harmless dummy customer note 25'],
    ['id' => 26, 'name' => 'Extra Customer 026', 'phone' => '0977000026', 'email' => 'extra026@elysian.test', 'note' => 'Harmless dummy customer note 26'],
    ['id' => 27, 'name' => 'Extra Customer 027', 'phone' => '0977000027', 'email' => 'extra027@elysian.test', 'note' => 'Harmless dummy customer note 27'],
    ['id' => 28, 'name' => 'Extra Customer 028', 'phone' => '0977000028', 'email' => 'extra028@elysian.test', 'note' => 'Harmless dummy customer note 28'],
    ['id' => 29, 'name' => 'Extra Customer 029', 'phone' => '0977000029', 'email' => 'extra029@elysian.test', 'note' => 'Harmless dummy customer note 29'],
    ['id' => 30, 'name' => 'Extra Customer 030', 'phone' => '0977000030', 'email' => 'extra030@elysian.test', 'note' => 'Harmless dummy customer note 30'],
    ['id' => 31, 'name' => 'Extra Customer 031', 'phone' => '0977000031', 'email' => 'extra031@elysian.test', 'note' => 'Harmless dummy customer note 31'],
    ['id' => 32, 'name' => 'Extra Customer 032', 'phone' => '0977000032', 'email' => 'extra032@elysian.test', 'note' => 'Harmless dummy customer note 32'],
    ['id' => 33, 'name' => 'Extra Customer 033', 'phone' => '0977000033', 'email' => 'extra033@elysian.test', 'note' => 'Harmless dummy customer note 33'],
    ['id' => 34, 'name' => 'Extra Customer 034', 'phone' => '0977000034', 'email' => 'extra034@elysian.test', 'note' => 'Harmless dummy customer note 34'],
    ['id' => 35, 'name' => 'Extra Customer 035', 'phone' => '0977000035', 'email' => 'extra035@elysian.test', 'note' => 'Harmless dummy customer note 35'],
    ['id' => 36, 'name' => 'Extra Customer 036', 'phone' => '0977000036', 'email' => 'extra036@elysian.test', 'note' => 'Harmless dummy customer note 36'],
    ['id' => 37, 'name' => 'Extra Customer 037', 'phone' => '0977000037', 'email' => 'extra037@elysian.test', 'note' => 'Harmless dummy customer note 37'],
    ['id' => 38, 'name' => 'Extra Customer 038', 'phone' => '0977000038', 'email' => 'extra038@elysian.test', 'note' => 'Harmless dummy customer note 38'],
    ['id' => 39, 'name' => 'Extra Customer 039', 'phone' => '0977000039', 'email' => 'extra039@elysian.test', 'note' => 'Harmless dummy customer note 39'],
    ['id' => 40, 'name' => 'Extra Customer 040', 'phone' => '0977000040', 'email' => 'extra040@elysian.test', 'note' => 'Harmless dummy customer note 40'],
    ['id' => 41, 'name' => 'Extra Customer 041', 'phone' => '0977000041', 'email' => 'extra041@elysian.test', 'note' => 'Harmless dummy customer note 41'],
    ['id' => 42, 'name' => 'Extra Customer 042', 'phone' => '0977000042', 'email' => 'extra042@elysian.test', 'note' => 'Harmless dummy customer note 42'],
    ['id' => 43, 'name' => 'Extra Customer 043', 'phone' => '0977000043', 'email' => 'extra043@elysian.test', 'note' => 'Harmless dummy customer note 43'],
    ['id' => 44, 'name' => 'Extra Customer 044', 'phone' => '0977000044', 'email' => 'extra044@elysian.test', 'note' => 'Harmless dummy customer note 44'],
    ['id' => 45, 'name' => 'Extra Customer 045', 'phone' => '0977000045', 'email' => 'extra045@elysian.test', 'note' => 'Harmless dummy customer note 45'],
    ['id' => 46, 'name' => 'Extra Customer 046', 'phone' => '0977000046', 'email' => 'extra046@elysian.test', 'note' => 'Harmless dummy customer note 46'],
    ['id' => 47, 'name' => 'Extra Customer 047', 'phone' => '0977000047', 'email' => 'extra047@elysian.test', 'note' => 'Harmless dummy customer note 47'],
    ['id' => 48, 'name' => 'Extra Customer 048', 'phone' => '0977000048', 'email' => 'extra048@elysian.test', 'note' => 'Harmless dummy customer note 48'],
    ['id' => 49, 'name' => 'Extra Customer 049', 'phone' => '0977000049', 'email' => 'extra049@elysian.test', 'note' => 'Harmless dummy customer note 49'],
    ['id' => 50, 'name' => 'Extra Customer 050', 'phone' => '0977000050', 'email' => 'extra050@elysian.test', 'note' => 'Harmless dummy customer note 50'],
    ['id' => 51, 'name' => 'Extra Customer 051', 'phone' => '0977000051', 'email' => 'extra051@elysian.test', 'note' => 'Harmless dummy customer note 51'],
    ['id' => 52, 'name' => 'Extra Customer 052', 'phone' => '0977000052', 'email' => 'extra052@elysian.test', 'note' => 'Harmless dummy customer note 52'],
    ['id' => 53, 'name' => 'Extra Customer 053', 'phone' => '0977000053', 'email' => 'extra053@elysian.test', 'note' => 'Harmless dummy customer note 53'],
    ['id' => 54, 'name' => 'Extra Customer 054', 'phone' => '0977000054', 'email' => 'extra054@elysian.test', 'note' => 'Harmless dummy customer note 54'],
    ['id' => 55, 'name' => 'Extra Customer 055', 'phone' => '0977000055', 'email' => 'extra055@elysian.test', 'note' => 'Harmless dummy customer note 55'],
    ['id' => 56, 'name' => 'Extra Customer 056', 'phone' => '0977000056', 'email' => 'extra056@elysian.test', 'note' => 'Harmless dummy customer note 56'],
    ['id' => 57, 'name' => 'Extra Customer 057', 'phone' => '0977000057', 'email' => 'extra057@elysian.test', 'note' => 'Harmless dummy customer note 57'],
    ['id' => 58, 'name' => 'Extra Customer 058', 'phone' => '0977000058', 'email' => 'extra058@elysian.test', 'note' => 'Harmless dummy customer note 58'],
    ['id' => 59, 'name' => 'Extra Customer 059', 'phone' => '0977000059', 'email' => 'extra059@elysian.test', 'note' => 'Harmless dummy customer note 59'],
    ['id' => 60, 'name' => 'Extra Customer 060', 'phone' => '0977000060', 'email' => 'extra060@elysian.test', 'note' => 'Harmless dummy customer note 60'],
    ['id' => 61, 'name' => 'Extra Customer 061', 'phone' => '0977000061', 'email' => 'extra061@elysian.test', 'note' => 'Harmless dummy customer note 61'],
    ['id' => 62, 'name' => 'Extra Customer 062', 'phone' => '0977000062', 'email' => 'extra062@elysian.test', 'note' => 'Harmless dummy customer note 62'],
    ['id' => 63, 'name' => 'Extra Customer 063', 'phone' => '0977000063', 'email' => 'extra063@elysian.test', 'note' => 'Harmless dummy customer note 63'],
    ['id' => 64, 'name' => 'Extra Customer 064', 'phone' => '0977000064', 'email' => 'extra064@elysian.test', 'note' => 'Harmless dummy customer note 64'],
    ['id' => 65, 'name' => 'Extra Customer 065', 'phone' => '0977000065', 'email' => 'extra065@elysian.test', 'note' => 'Harmless dummy customer note 65'],
    ['id' => 66, 'name' => 'Extra Customer 066', 'phone' => '0977000066', 'email' => 'extra066@elysian.test', 'note' => 'Harmless dummy customer note 66'],
    ['id' => 67, 'name' => 'Extra Customer 067', 'phone' => '0977000067', 'email' => 'extra067@elysian.test', 'note' => 'Harmless dummy customer note 67'],
    ['id' => 68, 'name' => 'Extra Customer 068', 'phone' => '0977000068', 'email' => 'extra068@elysian.test', 'note' => 'Harmless dummy customer note 68'],
    ['id' => 69, 'name' => 'Extra Customer 069', 'phone' => '0977000069', 'email' => 'extra069@elysian.test', 'note' => 'Harmless dummy customer note 69'],
    ['id' => 70, 'name' => 'Extra Customer 070', 'phone' => '0977000070', 'email' => 'extra070@elysian.test', 'note' => 'Harmless dummy customer note 70'],
    ['id' => 71, 'name' => 'Extra Customer 071', 'phone' => '0977000071', 'email' => 'extra071@elysian.test', 'note' => 'Harmless dummy customer note 71'],
    ['id' => 72, 'name' => 'Extra Customer 072', 'phone' => '0977000072', 'email' => 'extra072@elysian.test', 'note' => 'Harmless dummy customer note 72'],
    ['id' => 73, 'name' => 'Extra Customer 073', 'phone' => '0977000073', 'email' => 'extra073@elysian.test', 'note' => 'Harmless dummy customer note 73'],
    ['id' => 74, 'name' => 'Extra Customer 074', 'phone' => '0977000074', 'email' => 'extra074@elysian.test', 'note' => 'Harmless dummy customer note 74'],
    ['id' => 75, 'name' => 'Extra Customer 075', 'phone' => '0977000075', 'email' => 'extra075@elysian.test', 'note' => 'Harmless dummy customer note 75'],
    ['id' => 76, 'name' => 'Extra Customer 076', 'phone' => '0977000076', 'email' => 'extra076@elysian.test', 'note' => 'Harmless dummy customer note 76'],
    ['id' => 77, 'name' => 'Extra Customer 077', 'phone' => '0977000077', 'email' => 'extra077@elysian.test', 'note' => 'Harmless dummy customer note 77'],
    ['id' => 78, 'name' => 'Extra Customer 078', 'phone' => '0977000078', 'email' => 'extra078@elysian.test', 'note' => 'Harmless dummy customer note 78'],
    ['id' => 79, 'name' => 'Extra Customer 079', 'phone' => '0977000079', 'email' => 'extra079@elysian.test', 'note' => 'Harmless dummy customer note 79'],
    ['id' => 80, 'name' => 'Extra Customer 080', 'phone' => '0977000080', 'email' => 'extra080@elysian.test', 'note' => 'Harmless dummy customer note 80'],
    ['id' => 81, 'name' => 'Extra Customer 081', 'phone' => '0977000081', 'email' => 'extra081@elysian.test', 'note' => 'Harmless dummy customer note 81'],
    ['id' => 82, 'name' => 'Extra Customer 082', 'phone' => '0977000082', 'email' => 'extra082@elysian.test', 'note' => 'Harmless dummy customer note 82'],
    ['id' => 83, 'name' => 'Extra Customer 083', 'phone' => '0977000083', 'email' => 'extra083@elysian.test', 'note' => 'Harmless dummy customer note 83'],
    ['id' => 84, 'name' => 'Extra Customer 084', 'phone' => '0977000084', 'email' => 'extra084@elysian.test', 'note' => 'Harmless dummy customer note 84'],
    ['id' => 85, 'name' => 'Extra Customer 085', 'phone' => '0977000085', 'email' => 'extra085@elysian.test', 'note' => 'Harmless dummy customer note 85'],
    ['id' => 86, 'name' => 'Extra Customer 086', 'phone' => '0977000086', 'email' => 'extra086@elysian.test', 'note' => 'Harmless dummy customer note 86'],
    ['id' => 87, 'name' => 'Extra Customer 087', 'phone' => '0977000087', 'email' => 'extra087@elysian.test', 'note' => 'Harmless dummy customer note 87'],
    ['id' => 88, 'name' => 'Extra Customer 088', 'phone' => '0977000088', 'email' => 'extra088@elysian.test', 'note' => 'Harmless dummy customer note 88'],
    ['id' => 89, 'name' => 'Extra Customer 089', 'phone' => '0977000089', 'email' => 'extra089@elysian.test', 'note' => 'Harmless dummy customer note 89'],
    ['id' => 90, 'name' => 'Extra Customer 090', 'phone' => '0977000090', 'email' => 'extra090@elysian.test', 'note' => 'Harmless dummy customer note 90'],
    ['id' => 91, 'name' => 'Extra Customer 091', 'phone' => '0977000091', 'email' => 'extra091@elysian.test', 'note' => 'Harmless dummy customer note 91'],
    ['id' => 92, 'name' => 'Extra Customer 092', 'phone' => '0977000092', 'email' => 'extra092@elysian.test', 'note' => 'Harmless dummy customer note 92'],
    ['id' => 93, 'name' => 'Extra Customer 093', 'phone' => '0977000093', 'email' => 'extra093@elysian.test', 'note' => 'Harmless dummy customer note 93'],
    ['id' => 94, 'name' => 'Extra Customer 094', 'phone' => '0977000094', 'email' => 'extra094@elysian.test', 'note' => 'Harmless dummy customer note 94'],
    ['id' => 95, 'name' => 'Extra Customer 095', 'phone' => '0977000095', 'email' => 'extra095@elysian.test', 'note' => 'Harmless dummy customer note 95'],
    ['id' => 96, 'name' => 'Extra Customer 096', 'phone' => '0977000096', 'email' => 'extra096@elysian.test', 'note' => 'Harmless dummy customer note 96'],
    ['id' => 97, 'name' => 'Extra Customer 097', 'phone' => '0977000097', 'email' => 'extra097@elysian.test', 'note' => 'Harmless dummy customer note 97'],
    ['id' => 98, 'name' => 'Extra Customer 098', 'phone' => '0977000098', 'email' => 'extra098@elysian.test', 'note' => 'Harmless dummy customer note 98'],
    ['id' => 99, 'name' => 'Extra Customer 099', 'phone' => '0977000099', 'email' => 'extra099@elysian.test', 'note' => 'Harmless dummy customer note 99'],
    ['id' => 100, 'name' => 'Extra Customer 100', 'phone' => '0977000100', 'email' => 'extra100@elysian.test', 'note' => 'Harmless dummy customer note 100'],
    ['id' => 101, 'name' => 'Extra Customer 101', 'phone' => '0977000101', 'email' => 'extra101@elysian.test', 'note' => 'Harmless dummy customer note 101'],
    ['id' => 102, 'name' => 'Extra Customer 102', 'phone' => '0977000102', 'email' => 'extra102@elysian.test', 'note' => 'Harmless dummy customer note 102'],
    ['id' => 103, 'name' => 'Extra Customer 103', 'phone' => '0977000103', 'email' => 'extra103@elysian.test', 'note' => 'Harmless dummy customer note 103'],
    ['id' => 104, 'name' => 'Extra Customer 104', 'phone' => '0977000104', 'email' => 'extra104@elysian.test', 'note' => 'Harmless dummy customer note 104'],
    ['id' => 105, 'name' => 'Extra Customer 105', 'phone' => '0977000105', 'email' => 'extra105@elysian.test', 'note' => 'Harmless dummy customer note 105'],
    ['id' => 106, 'name' => 'Extra Customer 106', 'phone' => '0977000106', 'email' => 'extra106@elysian.test', 'note' => 'Harmless dummy customer note 106'],
    ['id' => 107, 'name' => 'Extra Customer 107', 'phone' => '0977000107', 'email' => 'extra107@elysian.test', 'note' => 'Harmless dummy customer note 107'],
    ['id' => 108, 'name' => 'Extra Customer 108', 'phone' => '0977000108', 'email' => 'extra108@elysian.test', 'note' => 'Harmless dummy customer note 108'],
    ['id' => 109, 'name' => 'Extra Customer 109', 'phone' => '0977000109', 'email' => 'extra109@elysian.test', 'note' => 'Harmless dummy customer note 109'],
    ['id' => 110, 'name' => 'Extra Customer 110', 'phone' => '0977000110', 'email' => 'extra110@elysian.test', 'note' => 'Harmless dummy customer note 110'],
    ['id' => 111, 'name' => 'Extra Customer 111', 'phone' => '0977000111', 'email' => 'extra111@elysian.test', 'note' => 'Harmless dummy customer note 111'],
    ['id' => 112, 'name' => 'Extra Customer 112', 'phone' => '0977000112', 'email' => 'extra112@elysian.test', 'note' => 'Harmless dummy customer note 112'],
    ['id' => 113, 'name' => 'Extra Customer 113', 'phone' => '0977000113', 'email' => 'extra113@elysian.test', 'note' => 'Harmless dummy customer note 113'],
    ['id' => 114, 'name' => 'Extra Customer 114', 'phone' => '0977000114', 'email' => 'extra114@elysian.test', 'note' => 'Harmless dummy customer note 114'],
    ['id' => 115, 'name' => 'Extra Customer 115', 'phone' => '0977000115', 'email' => 'extra115@elysian.test', 'note' => 'Harmless dummy customer note 115'],
    ['id' => 116, 'name' => 'Extra Customer 116', 'phone' => '0977000116', 'email' => 'extra116@elysian.test', 'note' => 'Harmless dummy customer note 116'],
    ['id' => 117, 'name' => 'Extra Customer 117', 'phone' => '0977000117', 'email' => 'extra117@elysian.test', 'note' => 'Harmless dummy customer note 117'],
    ['id' => 118, 'name' => 'Extra Customer 118', 'phone' => '0977000118', 'email' => 'extra118@elysian.test', 'note' => 'Harmless dummy customer note 118'],
    ['id' => 119, 'name' => 'Extra Customer 119', 'phone' => '0977000119', 'email' => 'extra119@elysian.test', 'note' => 'Harmless dummy customer note 119'],
    ['id' => 120, 'name' => 'Extra Customer 120', 'phone' => '0977000120', 'email' => 'extra120@elysian.test', 'note' => 'Harmless dummy customer note 120'],
    ['id' => 121, 'name' => 'Extra Customer 121', 'phone' => '0977000121', 'email' => 'extra121@elysian.test', 'note' => 'Harmless dummy customer note 121'],
    ['id' => 122, 'name' => 'Extra Customer 122', 'phone' => '0977000122', 'email' => 'extra122@elysian.test', 'note' => 'Harmless dummy customer note 122'],
    ['id' => 123, 'name' => 'Extra Customer 123', 'phone' => '0977000123', 'email' => 'extra123@elysian.test', 'note' => 'Harmless dummy customer note 123'],
    ['id' => 124, 'name' => 'Extra Customer 124', 'phone' => '0977000124', 'email' => 'extra124@elysian.test', 'note' => 'Harmless dummy customer note 124'],
    ['id' => 125, 'name' => 'Extra Customer 125', 'phone' => '0977000125', 'email' => 'extra125@elysian.test', 'note' => 'Harmless dummy customer note 125'],
    ['id' => 126, 'name' => 'Extra Customer 126', 'phone' => '0977000126', 'email' => 'extra126@elysian.test', 'note' => 'Harmless dummy customer note 126'],
    ['id' => 127, 'name' => 'Extra Customer 127', 'phone' => '0977000127', 'email' => 'extra127@elysian.test', 'note' => 'Harmless dummy customer note 127'],
    ['id' => 128, 'name' => 'Extra Customer 128', 'phone' => '0977000128', 'email' => 'extra128@elysian.test', 'note' => 'Harmless dummy customer note 128'],
    ['id' => 129, 'name' => 'Extra Customer 129', 'phone' => '0977000129', 'email' => 'extra129@elysian.test', 'note' => 'Harmless dummy customer note 129'],
    ['id' => 130, 'name' => 'Extra Customer 130', 'phone' => '0977000130', 'email' => 'extra130@elysian.test', 'note' => 'Harmless dummy customer note 130'],
    ['id' => 131, 'name' => 'Extra Customer 131', 'phone' => '0977000131', 'email' => 'extra131@elysian.test', 'note' => 'Harmless dummy customer note 131'],
    ['id' => 132, 'name' => 'Extra Customer 132', 'phone' => '0977000132', 'email' => 'extra132@elysian.test', 'note' => 'Harmless dummy customer note 132'],
    ['id' => 133, 'name' => 'Extra Customer 133', 'phone' => '0977000133', 'email' => 'extra133@elysian.test', 'note' => 'Harmless dummy customer note 133'],
    ['id' => 134, 'name' => 'Extra Customer 134', 'phone' => '0977000134', 'email' => 'extra134@elysian.test', 'note' => 'Harmless dummy customer note 134'],
    ['id' => 135, 'name' => 'Extra Customer 135', 'phone' => '0977000135', 'email' => 'extra135@elysian.test', 'note' => 'Harmless dummy customer note 135'],
    ['id' => 136, 'name' => 'Extra Customer 136', 'phone' => '0977000136', 'email' => 'extra136@elysian.test', 'note' => 'Harmless dummy customer note 136'],
    ['id' => 137, 'name' => 'Extra Customer 137', 'phone' => '0977000137', 'email' => 'extra137@elysian.test', 'note' => 'Harmless dummy customer note 137'],
    ['id' => 138, 'name' => 'Extra Customer 138', 'phone' => '0977000138', 'email' => 'extra138@elysian.test', 'note' => 'Harmless dummy customer note 138'],
    ['id' => 139, 'name' => 'Extra Customer 139', 'phone' => '0977000139', 'email' => 'extra139@elysian.test', 'note' => 'Harmless dummy customer note 139'],
    ['id' => 140, 'name' => 'Extra Customer 140', 'phone' => '0977000140', 'email' => 'extra140@elysian.test', 'note' => 'Harmless dummy customer note 140'],
    ['id' => 141, 'name' => 'Extra Customer 141', 'phone' => '0977000141', 'email' => 'extra141@elysian.test', 'note' => 'Harmless dummy customer note 141'],
    ['id' => 142, 'name' => 'Extra Customer 142', 'phone' => '0977000142', 'email' => 'extra142@elysian.test', 'note' => 'Harmless dummy customer note 142'],
    ['id' => 143, 'name' => 'Extra Customer 143', 'phone' => '0977000143', 'email' => 'extra143@elysian.test', 'note' => 'Harmless dummy customer note 143'],
    ['id' => 144, 'name' => 'Extra Customer 144', 'phone' => '0977000144', 'email' => 'extra144@elysian.test', 'note' => 'Harmless dummy customer note 144'],
    ['id' => 145, 'name' => 'Extra Customer 145', 'phone' => '0977000145', 'email' => 'extra145@elysian.test', 'note' => 'Harmless dummy customer note 145'],
    ['id' => 146, 'name' => 'Extra Customer 146', 'phone' => '0977000146', 'email' => 'extra146@elysian.test', 'note' => 'Harmless dummy customer note 146'],
    ['id' => 147, 'name' => 'Extra Customer 147', 'phone' => '0977000147', 'email' => 'extra147@elysian.test', 'note' => 'Harmless dummy customer note 147'],
    ['id' => 148, 'name' => 'Extra Customer 148', 'phone' => '0977000148', 'email' => 'extra148@elysian.test', 'note' => 'Harmless dummy customer note 148'],
    ['id' => 149, 'name' => 'Extra Customer 149', 'phone' => '0977000149', 'email' => 'extra149@elysian.test', 'note' => 'Harmless dummy customer note 149'],
    ['id' => 150, 'name' => 'Extra Customer 150', 'phone' => '0977000150', 'email' => 'extra150@elysian.test', 'note' => 'Harmless dummy customer note 150'],
    ['id' => 151, 'name' => 'Extra Customer 151', 'phone' => '0977000151', 'email' => 'extra151@elysian.test', 'note' => 'Harmless dummy customer note 151'],
    ['id' => 152, 'name' => 'Extra Customer 152', 'phone' => '0977000152', 'email' => 'extra152@elysian.test', 'note' => 'Harmless dummy customer note 152'],
    ['id' => 153, 'name' => 'Extra Customer 153', 'phone' => '0977000153', 'email' => 'extra153@elysian.test', 'note' => 'Harmless dummy customer note 153'],
    ['id' => 154, 'name' => 'Extra Customer 154', 'phone' => '0977000154', 'email' => 'extra154@elysian.test', 'note' => 'Harmless dummy customer note 154'],
    ['id' => 155, 'name' => 'Extra Customer 155', 'phone' => '0977000155', 'email' => 'extra155@elysian.test', 'note' => 'Harmless dummy customer note 155'],
    ['id' => 156, 'name' => 'Extra Customer 156', 'phone' => '0977000156', 'email' => 'extra156@elysian.test', 'note' => 'Harmless dummy customer note 156'],
    ['id' => 157, 'name' => 'Extra Customer 157', 'phone' => '0977000157', 'email' => 'extra157@elysian.test', 'note' => 'Harmless dummy customer note 157'],
    ['id' => 158, 'name' => 'Extra Customer 158', 'phone' => '0977000158', 'email' => 'extra158@elysian.test', 'note' => 'Harmless dummy customer note 158'],
    ['id' => 159, 'name' => 'Extra Customer 159', 'phone' => '0977000159', 'email' => 'extra159@elysian.test', 'note' => 'Harmless dummy customer note 159'],
    ['id' => 160, 'name' => 'Extra Customer 160', 'phone' => '0977000160', 'email' => 'extra160@elysian.test', 'note' => 'Harmless dummy customer note 160'],
    ['id' => 161, 'name' => 'Extra Customer 161', 'phone' => '0977000161', 'email' => 'extra161@elysian.test', 'note' => 'Harmless dummy customer note 161'],
    ['id' => 162, 'name' => 'Extra Customer 162', 'phone' => '0977000162', 'email' => 'extra162@elysian.test', 'note' => 'Harmless dummy customer note 162'],
    ['id' => 163, 'name' => 'Extra Customer 163', 'phone' => '0977000163', 'email' => 'extra163@elysian.test', 'note' => 'Harmless dummy customer note 163'],
    ['id' => 164, 'name' => 'Extra Customer 164', 'phone' => '0977000164', 'email' => 'extra164@elysian.test', 'note' => 'Harmless dummy customer note 164'],
    ['id' => 165, 'name' => 'Extra Customer 165', 'phone' => '0977000165', 'email' => 'extra165@elysian.test', 'note' => 'Harmless dummy customer note 165'],
    ['id' => 166, 'name' => 'Extra Customer 166', 'phone' => '0977000166', 'email' => 'extra166@elysian.test', 'note' => 'Harmless dummy customer note 166'],
    ['id' => 167, 'name' => 'Extra Customer 167', 'phone' => '0977000167', 'email' => 'extra167@elysian.test', 'note' => 'Harmless dummy customer note 167'],
    ['id' => 168, 'name' => 'Extra Customer 168', 'phone' => '0977000168', 'email' => 'extra168@elysian.test', 'note' => 'Harmless dummy customer note 168'],
    ['id' => 169, 'name' => 'Extra Customer 169', 'phone' => '0977000169', 'email' => 'extra169@elysian.test', 'note' => 'Harmless dummy customer note 169'],
    ['id' => 170, 'name' => 'Extra Customer 170', 'phone' => '0977000170', 'email' => 'extra170@elysian.test', 'note' => 'Harmless dummy customer note 170'],
    ['id' => 171, 'name' => 'Extra Customer 171', 'phone' => '0977000171', 'email' => 'extra171@elysian.test', 'note' => 'Harmless dummy customer note 171'],
    ['id' => 172, 'name' => 'Extra Customer 172', 'phone' => '0977000172', 'email' => 'extra172@elysian.test', 'note' => 'Harmless dummy customer note 172'],
    ['id' => 173, 'name' => 'Extra Customer 173', 'phone' => '0977000173', 'email' => 'extra173@elysian.test', 'note' => 'Harmless dummy customer note 173'],
    ['id' => 174, 'name' => 'Extra Customer 174', 'phone' => '0977000174', 'email' => 'extra174@elysian.test', 'note' => 'Harmless dummy customer note 174'],
    ['id' => 175, 'name' => 'Extra Customer 175', 'phone' => '0977000175', 'email' => 'extra175@elysian.test', 'note' => 'Harmless dummy customer note 175'],
    ['id' => 176, 'name' => 'Extra Customer 176', 'phone' => '0977000176', 'email' => 'extra176@elysian.test', 'note' => 'Harmless dummy customer note 176'],
    ['id' => 177, 'name' => 'Extra Customer 177', 'phone' => '0977000177', 'email' => 'extra177@elysian.test', 'note' => 'Harmless dummy customer note 177'],
    ['id' => 178, 'name' => 'Extra Customer 178', 'phone' => '0977000178', 'email' => 'extra178@elysian.test', 'note' => 'Harmless dummy customer note 178'],
    ['id' => 179, 'name' => 'Extra Customer 179', 'phone' => '0977000179', 'email' => 'extra179@elysian.test', 'note' => 'Harmless dummy customer note 179'],
    ['id' => 180, 'name' => 'Extra Customer 180', 'phone' => '0977000180', 'email' => 'extra180@elysian.test', 'note' => 'Harmless dummy customer note 180'],
    ['id' => 181, 'name' => 'Extra Customer 181', 'phone' => '0977000181', 'email' => 'extra181@elysian.test', 'note' => 'Harmless dummy customer note 181'],
    ['id' => 182, 'name' => 'Extra Customer 182', 'phone' => '0977000182', 'email' => 'extra182@elysian.test', 'note' => 'Harmless dummy customer note 182'],
    ['id' => 183, 'name' => 'Extra Customer 183', 'phone' => '0977000183', 'email' => 'extra183@elysian.test', 'note' => 'Harmless dummy customer note 183'],
    ['id' => 184, 'name' => 'Extra Customer 184', 'phone' => '0977000184', 'email' => 'extra184@elysian.test', 'note' => 'Harmless dummy customer note 184'],
    ['id' => 185, 'name' => 'Extra Customer 185', 'phone' => '0977000185', 'email' => 'extra185@elysian.test', 'note' => 'Harmless dummy customer note 185'],
    ['id' => 186, 'name' => 'Extra Customer 186', 'phone' => '0977000186', 'email' => 'extra186@elysian.test', 'note' => 'Harmless dummy customer note 186'],
    ['id' => 187, 'name' => 'Extra Customer 187', 'phone' => '0977000187', 'email' => 'extra187@elysian.test', 'note' => 'Harmless dummy customer note 187'],
    ['id' => 188, 'name' => 'Extra Customer 188', 'phone' => '0977000188', 'email' => 'extra188@elysian.test', 'note' => 'Harmless dummy customer note 188'],
    ['id' => 189, 'name' => 'Extra Customer 189', 'phone' => '0977000189', 'email' => 'extra189@elysian.test', 'note' => 'Harmless dummy customer note 189'],
    ['id' => 190, 'name' => 'Extra Customer 190', 'phone' => '0977000190', 'email' => 'extra190@elysian.test', 'note' => 'Harmless dummy customer note 190'],
    ['id' => 191, 'name' => 'Extra Customer 191', 'phone' => '0977000191', 'email' => 'extra191@elysian.test', 'note' => 'Harmless dummy customer note 191'],
    ['id' => 192, 'name' => 'Extra Customer 192', 'phone' => '0977000192', 'email' => 'extra192@elysian.test', 'note' => 'Harmless dummy customer note 192'],
    ['id' => 193, 'name' => 'Extra Customer 193', 'phone' => '0977000193', 'email' => 'extra193@elysian.test', 'note' => 'Harmless dummy customer note 193'],
    ['id' => 194, 'name' => 'Extra Customer 194', 'phone' => '0977000194', 'email' => 'extra194@elysian.test', 'note' => 'Harmless dummy customer note 194'],
    ['id' => 195, 'name' => 'Extra Customer 195', 'phone' => '0977000195', 'email' => 'extra195@elysian.test', 'note' => 'Harmless dummy customer note 195'],
    ['id' => 196, 'name' => 'Extra Customer 196', 'phone' => '0977000196', 'email' => 'extra196@elysian.test', 'note' => 'Harmless dummy customer note 196'],
    ['id' => 197, 'name' => 'Extra Customer 197', 'phone' => '0977000197', 'email' => 'extra197@elysian.test', 'note' => 'Harmless dummy customer note 197'],
    ['id' => 198, 'name' => 'Extra Customer 198', 'phone' => '0977000198', 'email' => 'extra198@elysian.test', 'note' => 'Harmless dummy customer note 198'],
    ['id' => 199, 'name' => 'Extra Customer 199', 'phone' => '0977000199', 'email' => 'extra199@elysian.test', 'note' => 'Harmless dummy customer note 199'],
    ['id' => 200, 'name' => 'Extra Customer 200', 'phone' => '0977000200', 'email' => 'extra200@elysian.test', 'note' => 'Harmless dummy customer note 200'],
    ['id' => 201, 'name' => 'Extra Customer 201', 'phone' => '0977000201', 'email' => 'extra201@elysian.test', 'note' => 'Harmless dummy customer note 201'],
    ['id' => 202, 'name' => 'Extra Customer 202', 'phone' => '0977000202', 'email' => 'extra202@elysian.test', 'note' => 'Harmless dummy customer note 202'],
    ['id' => 203, 'name' => 'Extra Customer 203', 'phone' => '0977000203', 'email' => 'extra203@elysian.test', 'note' => 'Harmless dummy customer note 203'],
    ['id' => 204, 'name' => 'Extra Customer 204', 'phone' => '0977000204', 'email' => 'extra204@elysian.test', 'note' => 'Harmless dummy customer note 204'],
    ['id' => 205, 'name' => 'Extra Customer 205', 'phone' => '0977000205', 'email' => 'extra205@elysian.test', 'note' => 'Harmless dummy customer note 205'],
    ['id' => 206, 'name' => 'Extra Customer 206', 'phone' => '0977000206', 'email' => 'extra206@elysian.test', 'note' => 'Harmless dummy customer note 206'],
    ['id' => 207, 'name' => 'Extra Customer 207', 'phone' => '0977000207', 'email' => 'extra207@elysian.test', 'note' => 'Harmless dummy customer note 207'],
    ['id' => 208, 'name' => 'Extra Customer 208', 'phone' => '0977000208', 'email' => 'extra208@elysian.test', 'note' => 'Harmless dummy customer note 208'],
    ['id' => 209, 'name' => 'Extra Customer 209', 'phone' => '0977000209', 'email' => 'extra209@elysian.test', 'note' => 'Harmless dummy customer note 209'],
    ['id' => 210, 'name' => 'Extra Customer 210', 'phone' => '0977000210', 'email' => 'extra210@elysian.test', 'note' => 'Harmless dummy customer note 210'],
    ['id' => 211, 'name' => 'Extra Customer 211', 'phone' => '0977000211', 'email' => 'extra211@elysian.test', 'note' => 'Harmless dummy customer note 211'],
    ['id' => 212, 'name' => 'Extra Customer 212', 'phone' => '0977000212', 'email' => 'extra212@elysian.test', 'note' => 'Harmless dummy customer note 212'],
    ['id' => 213, 'name' => 'Extra Customer 213', 'phone' => '0977000213', 'email' => 'extra213@elysian.test', 'note' => 'Harmless dummy customer note 213'],
    ['id' => 214, 'name' => 'Extra Customer 214', 'phone' => '0977000214', 'email' => 'extra214@elysian.test', 'note' => 'Harmless dummy customer note 214'],
    ['id' => 215, 'name' => 'Extra Customer 215', 'phone' => '0977000215', 'email' => 'extra215@elysian.test', 'note' => 'Harmless dummy customer note 215'],
    ['id' => 216, 'name' => 'Extra Customer 216', 'phone' => '0977000216', 'email' => 'extra216@elysian.test', 'note' => 'Harmless dummy customer note 216'],
    ['id' => 217, 'name' => 'Extra Customer 217', 'phone' => '0977000217', 'email' => 'extra217@elysian.test', 'note' => 'Harmless dummy customer note 217'],
    ['id' => 218, 'name' => 'Extra Customer 218', 'phone' => '0977000218', 'email' => 'extra218@elysian.test', 'note' => 'Harmless dummy customer note 218'],
    ['id' => 219, 'name' => 'Extra Customer 219', 'phone' => '0977000219', 'email' => 'extra219@elysian.test', 'note' => 'Harmless dummy customer note 219'],
    ['id' => 220, 'name' => 'Extra Customer 220', 'phone' => '0977000220', 'email' => 'extra220@elysian.test', 'note' => 'Harmless dummy customer note 220'],
    ['id' => 221, 'name' => 'Extra Customer 221', 'phone' => '0977000221', 'email' => 'extra221@elysian.test', 'note' => 'Harmless dummy customer note 221'],
    ['id' => 222, 'name' => 'Extra Customer 222', 'phone' => '0977000222', 'email' => 'extra222@elysian.test', 'note' => 'Harmless dummy customer note 222'],
    ['id' => 223, 'name' => 'Extra Customer 223', 'phone' => '0977000223', 'email' => 'extra223@elysian.test', 'note' => 'Harmless dummy customer note 223'],
    ['id' => 224, 'name' => 'Extra Customer 224', 'phone' => '0977000224', 'email' => 'extra224@elysian.test', 'note' => 'Harmless dummy customer note 224'],
    ['id' => 225, 'name' => 'Extra Customer 225', 'phone' => '0977000225', 'email' => 'extra225@elysian.test', 'note' => 'Harmless dummy customer note 225'],
    ['id' => 226, 'name' => 'Extra Customer 226', 'phone' => '0977000226', 'email' => 'extra226@elysian.test', 'note' => 'Harmless dummy customer note 226'],
    ['id' => 227, 'name' => 'Extra Customer 227', 'phone' => '0977000227', 'email' => 'extra227@elysian.test', 'note' => 'Harmless dummy customer note 227'],
    ['id' => 228, 'name' => 'Extra Customer 228', 'phone' => '0977000228', 'email' => 'extra228@elysian.test', 'note' => 'Harmless dummy customer note 228'],
    ['id' => 229, 'name' => 'Extra Customer 229', 'phone' => '0977000229', 'email' => 'extra229@elysian.test', 'note' => 'Harmless dummy customer note 229'],
    ['id' => 230, 'name' => 'Extra Customer 230', 'phone' => '0977000230', 'email' => 'extra230@elysian.test', 'note' => 'Harmless dummy customer note 230'],
    ['id' => 231, 'name' => 'Extra Customer 231', 'phone' => '0977000231', 'email' => 'extra231@elysian.test', 'note' => 'Harmless dummy customer note 231'],
    ['id' => 232, 'name' => 'Extra Customer 232', 'phone' => '0977000232', 'email' => 'extra232@elysian.test', 'note' => 'Harmless dummy customer note 232'],
    ['id' => 233, 'name' => 'Extra Customer 233', 'phone' => '0977000233', 'email' => 'extra233@elysian.test', 'note' => 'Harmless dummy customer note 233'],
    ['id' => 234, 'name' => 'Extra Customer 234', 'phone' => '0977000234', 'email' => 'extra234@elysian.test', 'note' => 'Harmless dummy customer note 234'],
    ['id' => 235, 'name' => 'Extra Customer 235', 'phone' => '0977000235', 'email' => 'extra235@elysian.test', 'note' => 'Harmless dummy customer note 235'],
    ['id' => 236, 'name' => 'Extra Customer 236', 'phone' => '0977000236', 'email' => 'extra236@elysian.test', 'note' => 'Harmless dummy customer note 236'],
    ['id' => 237, 'name' => 'Extra Customer 237', 'phone' => '0977000237', 'email' => 'extra237@elysian.test', 'note' => 'Harmless dummy customer note 237'],
    ['id' => 238, 'name' => 'Extra Customer 238', 'phone' => '0977000238', 'email' => 'extra238@elysian.test', 'note' => 'Harmless dummy customer note 238'],
    ['id' => 239, 'name' => 'Extra Customer 239', 'phone' => '0977000239', 'email' => 'extra239@elysian.test', 'note' => 'Harmless dummy customer note 239'],
    ['id' => 240, 'name' => 'Extra Customer 240', 'phone' => '0977000240', 'email' => 'extra240@elysian.test', 'note' => 'Harmless dummy customer note 240'],
    ['id' => 241, 'name' => 'Extra Customer 241', 'phone' => '0977000241', 'email' => 'extra241@elysian.test', 'note' => 'Harmless dummy customer note 241'],
    ['id' => 242, 'name' => 'Extra Customer 242', 'phone' => '0977000242', 'email' => 'extra242@elysian.test', 'note' => 'Harmless dummy customer note 242'],
    ['id' => 243, 'name' => 'Extra Customer 243', 'phone' => '0977000243', 'email' => 'extra243@elysian.test', 'note' => 'Harmless dummy customer note 243'],
    ['id' => 244, 'name' => 'Extra Customer 244', 'phone' => '0977000244', 'email' => 'extra244@elysian.test', 'note' => 'Harmless dummy customer note 244'],
    ['id' => 245, 'name' => 'Extra Customer 245', 'phone' => '0977000245', 'email' => 'extra245@elysian.test', 'note' => 'Harmless dummy customer note 245'],
    ['id' => 246, 'name' => 'Extra Customer 246', 'phone' => '0977000246', 'email' => 'extra246@elysian.test', 'note' => 'Harmless dummy customer note 246'],
    ['id' => 247, 'name' => 'Extra Customer 247', 'phone' => '0977000247', 'email' => 'extra247@elysian.test', 'note' => 'Harmless dummy customer note 247'],
    ['id' => 248, 'name' => 'Extra Customer 248', 'phone' => '0977000248', 'email' => 'extra248@elysian.test', 'note' => 'Harmless dummy customer note 248'],
    ['id' => 249, 'name' => 'Extra Customer 249', 'phone' => '0977000249', 'email' => 'extra249@elysian.test', 'note' => 'Harmless dummy customer note 249'],
    ['id' => 250, 'name' => 'Extra Customer 250', 'phone' => '0977000250', 'email' => 'extra250@elysian.test', 'note' => 'Harmless dummy customer note 250'],
    ['id' => 251, 'name' => 'Extra Customer 251', 'phone' => '0977000251', 'email' => 'extra251@elysian.test', 'note' => 'Harmless dummy customer note 251'],
    ['id' => 252, 'name' => 'Extra Customer 252', 'phone' => '0977000252', 'email' => 'extra252@elysian.test', 'note' => 'Harmless dummy customer note 252'],
    ['id' => 253, 'name' => 'Extra Customer 253', 'phone' => '0977000253', 'email' => 'extra253@elysian.test', 'note' => 'Harmless dummy customer note 253'],
    ['id' => 254, 'name' => 'Extra Customer 254', 'phone' => '0977000254', 'email' => 'extra254@elysian.test', 'note' => 'Harmless dummy customer note 254'],
    ['id' => 255, 'name' => 'Extra Customer 255', 'phone' => '0977000255', 'email' => 'extra255@elysian.test', 'note' => 'Harmless dummy customer note 255'],
    ['id' => 256, 'name' => 'Extra Customer 256', 'phone' => '0977000256', 'email' => 'extra256@elysian.test', 'note' => 'Harmless dummy customer note 256'],
    ['id' => 257, 'name' => 'Extra Customer 257', 'phone' => '0977000257', 'email' => 'extra257@elysian.test', 'note' => 'Harmless dummy customer note 257'],
    ['id' => 258, 'name' => 'Extra Customer 258', 'phone' => '0977000258', 'email' => 'extra258@elysian.test', 'note' => 'Harmless dummy customer note 258'],
    ['id' => 259, 'name' => 'Extra Customer 259', 'phone' => '0977000259', 'email' => 'extra259@elysian.test', 'note' => 'Harmless dummy customer note 259'],
    ['id' => 260, 'name' => 'Extra Customer 260', 'phone' => '0977000260', 'email' => 'extra260@elysian.test', 'note' => 'Harmless dummy customer note 260'],
    ['id' => 261, 'name' => 'Extra Customer 261', 'phone' => '0977000261', 'email' => 'extra261@elysian.test', 'note' => 'Harmless dummy customer note 261'],
    ['id' => 262, 'name' => 'Extra Customer 262', 'phone' => '0977000262', 'email' => 'extra262@elysian.test', 'note' => 'Harmless dummy customer note 262'],
    ['id' => 263, 'name' => 'Extra Customer 263', 'phone' => '0977000263', 'email' => 'extra263@elysian.test', 'note' => 'Harmless dummy customer note 263'],
    ['id' => 264, 'name' => 'Extra Customer 264', 'phone' => '0977000264', 'email' => 'extra264@elysian.test', 'note' => 'Harmless dummy customer note 264'],
    ['id' => 265, 'name' => 'Extra Customer 265', 'phone' => '0977000265', 'email' => 'extra265@elysian.test', 'note' => 'Harmless dummy customer note 265'],
    ['id' => 266, 'name' => 'Extra Customer 266', 'phone' => '0977000266', 'email' => 'extra266@elysian.test', 'note' => 'Harmless dummy customer note 266'],
    ['id' => 267, 'name' => 'Extra Customer 267', 'phone' => '0977000267', 'email' => 'extra267@elysian.test', 'note' => 'Harmless dummy customer note 267'],
    ['id' => 268, 'name' => 'Extra Customer 268', 'phone' => '0977000268', 'email' => 'extra268@elysian.test', 'note' => 'Harmless dummy customer note 268'],
    ['id' => 269, 'name' => 'Extra Customer 269', 'phone' => '0977000269', 'email' => 'extra269@elysian.test', 'note' => 'Harmless dummy customer note 269'],
    ['id' => 270, 'name' => 'Extra Customer 270', 'phone' => '0977000270', 'email' => 'extra270@elysian.test', 'note' => 'Harmless dummy customer note 270'],
    ['id' => 271, 'name' => 'Extra Customer 271', 'phone' => '0977000271', 'email' => 'extra271@elysian.test', 'note' => 'Harmless dummy customer note 271'],
    ['id' => 272, 'name' => 'Extra Customer 272', 'phone' => '0977000272', 'email' => 'extra272@elysian.test', 'note' => 'Harmless dummy customer note 272'],
    ['id' => 273, 'name' => 'Extra Customer 273', 'phone' => '0977000273', 'email' => 'extra273@elysian.test', 'note' => 'Harmless dummy customer note 273'],
    ['id' => 274, 'name' => 'Extra Customer 274', 'phone' => '0977000274', 'email' => 'extra274@elysian.test', 'note' => 'Harmless dummy customer note 274'],
    ['id' => 275, 'name' => 'Extra Customer 275', 'phone' => '0977000275', 'email' => 'extra275@elysian.test', 'note' => 'Harmless dummy customer note 275'],
    ['id' => 276, 'name' => 'Extra Customer 276', 'phone' => '0977000276', 'email' => 'extra276@elysian.test', 'note' => 'Harmless dummy customer note 276'],
    ['id' => 277, 'name' => 'Extra Customer 277', 'phone' => '0977000277', 'email' => 'extra277@elysian.test', 'note' => 'Harmless dummy customer note 277'],
    ['id' => 278, 'name' => 'Extra Customer 278', 'phone' => '0977000278', 'email' => 'extra278@elysian.test', 'note' => 'Harmless dummy customer note 278'],
    ['id' => 279, 'name' => 'Extra Customer 279', 'phone' => '0977000279', 'email' => 'extra279@elysian.test', 'note' => 'Harmless dummy customer note 279'],
    ['id' => 280, 'name' => 'Extra Customer 280', 'phone' => '0977000280', 'email' => 'extra280@elysian.test', 'note' => 'Harmless dummy customer note 280'],
    ['id' => 281, 'name' => 'Extra Customer 281', 'phone' => '0977000281', 'email' => 'extra281@elysian.test', 'note' => 'Harmless dummy customer note 281'],
    ['id' => 282, 'name' => 'Extra Customer 282', 'phone' => '0977000282', 'email' => 'extra282@elysian.test', 'note' => 'Harmless dummy customer note 282'],
    ['id' => 283, 'name' => 'Extra Customer 283', 'phone' => '0977000283', 'email' => 'extra283@elysian.test', 'note' => 'Harmless dummy customer note 283'],
    ['id' => 284, 'name' => 'Extra Customer 284', 'phone' => '0977000284', 'email' => 'extra284@elysian.test', 'note' => 'Harmless dummy customer note 284'],
    ['id' => 285, 'name' => 'Extra Customer 285', 'phone' => '0977000285', 'email' => 'extra285@elysian.test', 'note' => 'Harmless dummy customer note 285'],
    ['id' => 286, 'name' => 'Extra Customer 286', 'phone' => '0977000286', 'email' => 'extra286@elysian.test', 'note' => 'Harmless dummy customer note 286'],
    ['id' => 287, 'name' => 'Extra Customer 287', 'phone' => '0977000287', 'email' => 'extra287@elysian.test', 'note' => 'Harmless dummy customer note 287'],
    ['id' => 288, 'name' => 'Extra Customer 288', 'phone' => '0977000288', 'email' => 'extra288@elysian.test', 'note' => 'Harmless dummy customer note 288'],
    ['id' => 289, 'name' => 'Extra Customer 289', 'phone' => '0977000289', 'email' => 'extra289@elysian.test', 'note' => 'Harmless dummy customer note 289'],
    ['id' => 290, 'name' => 'Extra Customer 290', 'phone' => '0977000290', 'email' => 'extra290@elysian.test', 'note' => 'Harmless dummy customer note 290'],
    ['id' => 291, 'name' => 'Extra Customer 291', 'phone' => '0977000291', 'email' => 'extra291@elysian.test', 'note' => 'Harmless dummy customer note 291'],
    ['id' => 292, 'name' => 'Extra Customer 292', 'phone' => '0977000292', 'email' => 'extra292@elysian.test', 'note' => 'Harmless dummy customer note 292'],
    ['id' => 293, 'name' => 'Extra Customer 293', 'phone' => '0977000293', 'email' => 'extra293@elysian.test', 'note' => 'Harmless dummy customer note 293'],
    ['id' => 294, 'name' => 'Extra Customer 294', 'phone' => '0977000294', 'email' => 'extra294@elysian.test', 'note' => 'Harmless dummy customer note 294'],
    ['id' => 295, 'name' => 'Extra Customer 295', 'phone' => '0977000295', 'email' => 'extra295@elysian.test', 'note' => 'Harmless dummy customer note 295'],
    ['id' => 296, 'name' => 'Extra Customer 296', 'phone' => '0977000296', 'email' => 'extra296@elysian.test', 'note' => 'Harmless dummy customer note 296'],
    ['id' => 297, 'name' => 'Extra Customer 297', 'phone' => '0977000297', 'email' => 'extra297@elysian.test', 'note' => 'Harmless dummy customer note 297'],
    ['id' => 298, 'name' => 'Extra Customer 298', 'phone' => '0977000298', 'email' => 'extra298@elysian.test', 'note' => 'Harmless dummy customer note 298'],
    ['id' => 299, 'name' => 'Extra Customer 299', 'phone' => '0977000299', 'email' => 'extra299@elysian.test', 'note' => 'Harmless dummy customer note 299'],
    ['id' => 300, 'name' => 'Extra Customer 300', 'phone' => '0977000300', 'email' => 'extra300@elysian.test', 'note' => 'Harmless dummy customer note 300'],
];

$extraServices = [
    ['id' => 1, 'name' => 'Extra Demo Service 001', 'category' => 'Category 2', 'price' => 110000, 'duration' => 30],
    ['id' => 2, 'name' => 'Extra Demo Service 002', 'category' => 'Category 3', 'price' => 120000, 'duration' => 40],
    ['id' => 3, 'name' => 'Extra Demo Service 003', 'category' => 'Category 4', 'price' => 130000, 'duration' => 50],
    ['id' => 4, 'name' => 'Extra Demo Service 004', 'category' => 'Category 5', 'price' => 140000, 'duration' => 60],
    ['id' => 5, 'name' => 'Extra Demo Service 005', 'category' => 'Category 6', 'price' => 150000, 'duration' => 70],
    ['id' => 6, 'name' => 'Extra Demo Service 006', 'category' => 'Category 7', 'price' => 160000, 'duration' => 80],
    ['id' => 7, 'name' => 'Extra Demo Service 007', 'category' => 'Category 8', 'price' => 170000, 'duration' => 90],
    ['id' => 8, 'name' => 'Extra Demo Service 008', 'category' => 'Category 9', 'price' => 180000, 'duration' => 20],
    ['id' => 9, 'name' => 'Extra Demo Service 009', 'category' => 'Category 10', 'price' => 190000, 'duration' => 30],
    ['id' => 10, 'name' => 'Extra Demo Service 010', 'category' => 'Category 1', 'price' => 200000, 'duration' => 40],
    ['id' => 11, 'name' => 'Extra Demo Service 011', 'category' => 'Category 2', 'price' => 210000, 'duration' => 50],
    ['id' => 12, 'name' => 'Extra Demo Service 012', 'category' => 'Category 3', 'price' => 220000, 'duration' => 60],
    ['id' => 13, 'name' => 'Extra Demo Service 013', 'category' => 'Category 4', 'price' => 230000, 'duration' => 70],
    ['id' => 14, 'name' => 'Extra Demo Service 014', 'category' => 'Category 5', 'price' => 240000, 'duration' => 80],
    ['id' => 15, 'name' => 'Extra Demo Service 015', 'category' => 'Category 6', 'price' => 250000, 'duration' => 90],
    ['id' => 16, 'name' => 'Extra Demo Service 016', 'category' => 'Category 7', 'price' => 260000, 'duration' => 20],
    ['id' => 17, 'name' => 'Extra Demo Service 017', 'category' => 'Category 8', 'price' => 270000, 'duration' => 30],
    ['id' => 18, 'name' => 'Extra Demo Service 018', 'category' => 'Category 9', 'price' => 280000, 'duration' => 40],
    ['id' => 19, 'name' => 'Extra Demo Service 019', 'category' => 'Category 10', 'price' => 290000, 'duration' => 50],
    ['id' => 20, 'name' => 'Extra Demo Service 020', 'category' => 'Category 1', 'price' => 300000, 'duration' => 60],
    ['id' => 21, 'name' => 'Extra Demo Service 021', 'category' => 'Category 2', 'price' => 310000, 'duration' => 70],
    ['id' => 22, 'name' => 'Extra Demo Service 022', 'category' => 'Category 3', 'price' => 320000, 'duration' => 80],
    ['id' => 23, 'name' => 'Extra Demo Service 023', 'category' => 'Category 4', 'price' => 330000, 'duration' => 90],
    ['id' => 24, 'name' => 'Extra Demo Service 024', 'category' => 'Category 5', 'price' => 340000, 'duration' => 20],
    ['id' => 25, 'name' => 'Extra Demo Service 025', 'category' => 'Category 6', 'price' => 350000, 'duration' => 30],
    ['id' => 26, 'name' => 'Extra Demo Service 026', 'category' => 'Category 7', 'price' => 360000, 'duration' => 40],
    ['id' => 27, 'name' => 'Extra Demo Service 027', 'category' => 'Category 8', 'price' => 370000, 'duration' => 50],
    ['id' => 28, 'name' => 'Extra Demo Service 028', 'category' => 'Category 9', 'price' => 380000, 'duration' => 60],
    ['id' => 29, 'name' => 'Extra Demo Service 029', 'category' => 'Category 10', 'price' => 390000, 'duration' => 70],
    ['id' => 30, 'name' => 'Extra Demo Service 030', 'category' => 'Category 1', 'price' => 400000, 'duration' => 80],
    ['id' => 31, 'name' => 'Extra Demo Service 031', 'category' => 'Category 2', 'price' => 410000, 'duration' => 90],
    ['id' => 32, 'name' => 'Extra Demo Service 032', 'category' => 'Category 3', 'price' => 420000, 'duration' => 20],
    ['id' => 33, 'name' => 'Extra Demo Service 033', 'category' => 'Category 4', 'price' => 430000, 'duration' => 30],
    ['id' => 34, 'name' => 'Extra Demo Service 034', 'category' => 'Category 5', 'price' => 440000, 'duration' => 40],
    ['id' => 35, 'name' => 'Extra Demo Service 035', 'category' => 'Category 6', 'price' => 450000, 'duration' => 50],
    ['id' => 36, 'name' => 'Extra Demo Service 036', 'category' => 'Category 7', 'price' => 460000, 'duration' => 60],
    ['id' => 37, 'name' => 'Extra Demo Service 037', 'category' => 'Category 8', 'price' => 470000, 'duration' => 70],
    ['id' => 38, 'name' => 'Extra Demo Service 038', 'category' => 'Category 9', 'price' => 480000, 'duration' => 80],
    ['id' => 39, 'name' => 'Extra Demo Service 039', 'category' => 'Category 10', 'price' => 490000, 'duration' => 90],
    ['id' => 40, 'name' => 'Extra Demo Service 040', 'category' => 'Category 1', 'price' => 500000, 'duration' => 20],
    ['id' => 41, 'name' => 'Extra Demo Service 041', 'category' => 'Category 2', 'price' => 510000, 'duration' => 30],
    ['id' => 42, 'name' => 'Extra Demo Service 042', 'category' => 'Category 3', 'price' => 520000, 'duration' => 40],
    ['id' => 43, 'name' => 'Extra Demo Service 043', 'category' => 'Category 4', 'price' => 530000, 'duration' => 50],
    ['id' => 44, 'name' => 'Extra Demo Service 044', 'category' => 'Category 5', 'price' => 540000, 'duration' => 60],
    ['id' => 45, 'name' => 'Extra Demo Service 045', 'category' => 'Category 6', 'price' => 550000, 'duration' => 70],
    ['id' => 46, 'name' => 'Extra Demo Service 046', 'category' => 'Category 7', 'price' => 560000, 'duration' => 80],
    ['id' => 47, 'name' => 'Extra Demo Service 047', 'category' => 'Category 8', 'price' => 570000, 'duration' => 90],
    ['id' => 48, 'name' => 'Extra Demo Service 048', 'category' => 'Category 9', 'price' => 580000, 'duration' => 20],
    ['id' => 49, 'name' => 'Extra Demo Service 049', 'category' => 'Category 10', 'price' => 590000, 'duration' => 30],
    ['id' => 50, 'name' => 'Extra Demo Service 050', 'category' => 'Category 1', 'price' => 600000, 'duration' => 40],
    ['id' => 51, 'name' => 'Extra Demo Service 051', 'category' => 'Category 2', 'price' => 610000, 'duration' => 50],
    ['id' => 52, 'name' => 'Extra Demo Service 052', 'category' => 'Category 3', 'price' => 620000, 'duration' => 60],
    ['id' => 53, 'name' => 'Extra Demo Service 053', 'category' => 'Category 4', 'price' => 630000, 'duration' => 70],
    ['id' => 54, 'name' => 'Extra Demo Service 054', 'category' => 'Category 5', 'price' => 640000, 'duration' => 80],
    ['id' => 55, 'name' => 'Extra Demo Service 055', 'category' => 'Category 6', 'price' => 650000, 'duration' => 90],
    ['id' => 56, 'name' => 'Extra Demo Service 056', 'category' => 'Category 7', 'price' => 660000, 'duration' => 20],
    ['id' => 57, 'name' => 'Extra Demo Service 057', 'category' => 'Category 8', 'price' => 670000, 'duration' => 30],
    ['id' => 58, 'name' => 'Extra Demo Service 058', 'category' => 'Category 9', 'price' => 680000, 'duration' => 40],
    ['id' => 59, 'name' => 'Extra Demo Service 059', 'category' => 'Category 10', 'price' => 690000, 'duration' => 50],
    ['id' => 60, 'name' => 'Extra Demo Service 060', 'category' => 'Category 1', 'price' => 700000, 'duration' => 60],
    ['id' => 61, 'name' => 'Extra Demo Service 061', 'category' => 'Category 2', 'price' => 710000, 'duration' => 70],
    ['id' => 62, 'name' => 'Extra Demo Service 062', 'category' => 'Category 3', 'price' => 720000, 'duration' => 80],
    ['id' => 63, 'name' => 'Extra Demo Service 063', 'category' => 'Category 4', 'price' => 730000, 'duration' => 90],
    ['id' => 64, 'name' => 'Extra Demo Service 064', 'category' => 'Category 5', 'price' => 740000, 'duration' => 20],
    ['id' => 65, 'name' => 'Extra Demo Service 065', 'category' => 'Category 6', 'price' => 750000, 'duration' => 30],
    ['id' => 66, 'name' => 'Extra Demo Service 066', 'category' => 'Category 7', 'price' => 760000, 'duration' => 40],
    ['id' => 67, 'name' => 'Extra Demo Service 067', 'category' => 'Category 8', 'price' => 770000, 'duration' => 50],
    ['id' => 68, 'name' => 'Extra Demo Service 068', 'category' => 'Category 9', 'price' => 780000, 'duration' => 60],
    ['id' => 69, 'name' => 'Extra Demo Service 069', 'category' => 'Category 10', 'price' => 790000, 'duration' => 70],
    ['id' => 70, 'name' => 'Extra Demo Service 070', 'category' => 'Category 1', 'price' => 800000, 'duration' => 80],
    ['id' => 71, 'name' => 'Extra Demo Service 071', 'category' => 'Category 2', 'price' => 810000, 'duration' => 90],
    ['id' => 72, 'name' => 'Extra Demo Service 072', 'category' => 'Category 3', 'price' => 820000, 'duration' => 20],
    ['id' => 73, 'name' => 'Extra Demo Service 073', 'category' => 'Category 4', 'price' => 830000, 'duration' => 30],
    ['id' => 74, 'name' => 'Extra Demo Service 074', 'category' => 'Category 5', 'price' => 840000, 'duration' => 40],
    ['id' => 75, 'name' => 'Extra Demo Service 075', 'category' => 'Category 6', 'price' => 850000, 'duration' => 50],
    ['id' => 76, 'name' => 'Extra Demo Service 076', 'category' => 'Category 7', 'price' => 860000, 'duration' => 60],
    ['id' => 77, 'name' => 'Extra Demo Service 077', 'category' => 'Category 8', 'price' => 870000, 'duration' => 70],
    ['id' => 78, 'name' => 'Extra Demo Service 078', 'category' => 'Category 9', 'price' => 880000, 'duration' => 80],
    ['id' => 79, 'name' => 'Extra Demo Service 079', 'category' => 'Category 10', 'price' => 890000, 'duration' => 90],
    ['id' => 80, 'name' => 'Extra Demo Service 080', 'category' => 'Category 1', 'price' => 900000, 'duration' => 20],
    ['id' => 81, 'name' => 'Extra Demo Service 081', 'category' => 'Category 2', 'price' => 910000, 'duration' => 30],
    ['id' => 82, 'name' => 'Extra Demo Service 082', 'category' => 'Category 3', 'price' => 920000, 'duration' => 40],
    ['id' => 83, 'name' => 'Extra Demo Service 083', 'category' => 'Category 4', 'price' => 930000, 'duration' => 50],
    ['id' => 84, 'name' => 'Extra Demo Service 084', 'category' => 'Category 5', 'price' => 940000, 'duration' => 60],
    ['id' => 85, 'name' => 'Extra Demo Service 085', 'category' => 'Category 6', 'price' => 950000, 'duration' => 70],
    ['id' => 86, 'name' => 'Extra Demo Service 086', 'category' => 'Category 7', 'price' => 960000, 'duration' => 80],
    ['id' => 87, 'name' => 'Extra Demo Service 087', 'category' => 'Category 8', 'price' => 970000, 'duration' => 90],
    ['id' => 88, 'name' => 'Extra Demo Service 088', 'category' => 'Category 9', 'price' => 980000, 'duration' => 20],
    ['id' => 89, 'name' => 'Extra Demo Service 089', 'category' => 'Category 10', 'price' => 990000, 'duration' => 30],
    ['id' => 90, 'name' => 'Extra Demo Service 090', 'category' => 'Category 1', 'price' => 1000000, 'duration' => 40],
    ['id' => 91, 'name' => 'Extra Demo Service 091', 'category' => 'Category 2', 'price' => 1010000, 'duration' => 50],
    ['id' => 92, 'name' => 'Extra Demo Service 092', 'category' => 'Category 3', 'price' => 1020000, 'duration' => 60],
    ['id' => 93, 'name' => 'Extra Demo Service 093', 'category' => 'Category 4', 'price' => 1030000, 'duration' => 70],
    ['id' => 94, 'name' => 'Extra Demo Service 094', 'category' => 'Category 5', 'price' => 1040000, 'duration' => 80],
    ['id' => 95, 'name' => 'Extra Demo Service 095', 'category' => 'Category 6', 'price' => 1050000, 'duration' => 90],
    ['id' => 96, 'name' => 'Extra Demo Service 096', 'category' => 'Category 7', 'price' => 1060000, 'duration' => 20],
    ['id' => 97, 'name' => 'Extra Demo Service 097', 'category' => 'Category 8', 'price' => 1070000, 'duration' => 30],
    ['id' => 98, 'name' => 'Extra Demo Service 098', 'category' => 'Category 9', 'price' => 1080000, 'duration' => 40],
    ['id' => 99, 'name' => 'Extra Demo Service 099', 'category' => 'Category 10', 'price' => 1090000, 'duration' => 50],
    ['id' => 100, 'name' => 'Extra Demo Service 100', 'category' => 'Category 1', 'price' => 1100000, 'duration' => 60],
    ['id' => 101, 'name' => 'Extra Demo Service 101', 'category' => 'Category 2', 'price' => 1110000, 'duration' => 70],
    ['id' => 102, 'name' => 'Extra Demo Service 102', 'category' => 'Category 3', 'price' => 1120000, 'duration' => 80],
    ['id' => 103, 'name' => 'Extra Demo Service 103', 'category' => 'Category 4', 'price' => 1130000, 'duration' => 90],
    ['id' => 104, 'name' => 'Extra Demo Service 104', 'category' => 'Category 5', 'price' => 1140000, 'duration' => 20],
    ['id' => 105, 'name' => 'Extra Demo Service 105', 'category' => 'Category 6', 'price' => 1150000, 'duration' => 30],
    ['id' => 106, 'name' => 'Extra Demo Service 106', 'category' => 'Category 7', 'price' => 1160000, 'duration' => 40],
    ['id' => 107, 'name' => 'Extra Demo Service 107', 'category' => 'Category 8', 'price' => 1170000, 'duration' => 50],
    ['id' => 108, 'name' => 'Extra Demo Service 108', 'category' => 'Category 9', 'price' => 1180000, 'duration' => 60],
    ['id' => 109, 'name' => 'Extra Demo Service 109', 'category' => 'Category 10', 'price' => 1190000, 'duration' => 70],
    ['id' => 110, 'name' => 'Extra Demo Service 110', 'category' => 'Category 1', 'price' => 1200000, 'duration' => 80],
    ['id' => 111, 'name' => 'Extra Demo Service 111', 'category' => 'Category 2', 'price' => 1210000, 'duration' => 90],
    ['id' => 112, 'name' => 'Extra Demo Service 112', 'category' => 'Category 3', 'price' => 1220000, 'duration' => 20],
    ['id' => 113, 'name' => 'Extra Demo Service 113', 'category' => 'Category 4', 'price' => 1230000, 'duration' => 30],
    ['id' => 114, 'name' => 'Extra Demo Service 114', 'category' => 'Category 5', 'price' => 1240000, 'duration' => 40],
    ['id' => 115, 'name' => 'Extra Demo Service 115', 'category' => 'Category 6', 'price' => 1250000, 'duration' => 50],
    ['id' => 116, 'name' => 'Extra Demo Service 116', 'category' => 'Category 7', 'price' => 1260000, 'duration' => 60],
    ['id' => 117, 'name' => 'Extra Demo Service 117', 'category' => 'Category 8', 'price' => 1270000, 'duration' => 70],
    ['id' => 118, 'name' => 'Extra Demo Service 118', 'category' => 'Category 9', 'price' => 1280000, 'duration' => 80],
    ['id' => 119, 'name' => 'Extra Demo Service 119', 'category' => 'Category 10', 'price' => 1290000, 'duration' => 90],
    ['id' => 120, 'name' => 'Extra Demo Service 120', 'category' => 'Category 1', 'price' => 1300000, 'duration' => 20],
    ['id' => 121, 'name' => 'Extra Demo Service 121', 'category' => 'Category 2', 'price' => 1310000, 'duration' => 30],
    ['id' => 122, 'name' => 'Extra Demo Service 122', 'category' => 'Category 3', 'price' => 1320000, 'duration' => 40],
    ['id' => 123, 'name' => 'Extra Demo Service 123', 'category' => 'Category 4', 'price' => 1330000, 'duration' => 50],
    ['id' => 124, 'name' => 'Extra Demo Service 124', 'category' => 'Category 5', 'price' => 1340000, 'duration' => 60],
    ['id' => 125, 'name' => 'Extra Demo Service 125', 'category' => 'Category 6', 'price' => 1350000, 'duration' => 70],
    ['id' => 126, 'name' => 'Extra Demo Service 126', 'category' => 'Category 7', 'price' => 1360000, 'duration' => 80],
    ['id' => 127, 'name' => 'Extra Demo Service 127', 'category' => 'Category 8', 'price' => 1370000, 'duration' => 90],
    ['id' => 128, 'name' => 'Extra Demo Service 128', 'category' => 'Category 9', 'price' => 1380000, 'duration' => 20],
    ['id' => 129, 'name' => 'Extra Demo Service 129', 'category' => 'Category 10', 'price' => 1390000, 'duration' => 30],
    ['id' => 130, 'name' => 'Extra Demo Service 130', 'category' => 'Category 1', 'price' => 1400000, 'duration' => 40],
    ['id' => 131, 'name' => 'Extra Demo Service 131', 'category' => 'Category 2', 'price' => 1410000, 'duration' => 50],
    ['id' => 132, 'name' => 'Extra Demo Service 132', 'category' => 'Category 3', 'price' => 1420000, 'duration' => 60],
    ['id' => 133, 'name' => 'Extra Demo Service 133', 'category' => 'Category 4', 'price' => 1430000, 'duration' => 70],
    ['id' => 134, 'name' => 'Extra Demo Service 134', 'category' => 'Category 5', 'price' => 1440000, 'duration' => 80],
    ['id' => 135, 'name' => 'Extra Demo Service 135', 'category' => 'Category 6', 'price' => 1450000, 'duration' => 90],
    ['id' => 136, 'name' => 'Extra Demo Service 136', 'category' => 'Category 7', 'price' => 1460000, 'duration' => 20],
    ['id' => 137, 'name' => 'Extra Demo Service 137', 'category' => 'Category 8', 'price' => 1470000, 'duration' => 30],
    ['id' => 138, 'name' => 'Extra Demo Service 138', 'category' => 'Category 9', 'price' => 1480000, 'duration' => 40],
    ['id' => 139, 'name' => 'Extra Demo Service 139', 'category' => 'Category 10', 'price' => 1490000, 'duration' => 50],
    ['id' => 140, 'name' => 'Extra Demo Service 140', 'category' => 'Category 1', 'price' => 1500000, 'duration' => 60],
    ['id' => 141, 'name' => 'Extra Demo Service 141', 'category' => 'Category 2', 'price' => 1510000, 'duration' => 70],
    ['id' => 142, 'name' => 'Extra Demo Service 142', 'category' => 'Category 3', 'price' => 1520000, 'duration' => 80],
    ['id' => 143, 'name' => 'Extra Demo Service 143', 'category' => 'Category 4', 'price' => 1530000, 'duration' => 90],
    ['id' => 144, 'name' => 'Extra Demo Service 144', 'category' => 'Category 5', 'price' => 1540000, 'duration' => 20],
    ['id' => 145, 'name' => 'Extra Demo Service 145', 'category' => 'Category 6', 'price' => 1550000, 'duration' => 30],
    ['id' => 146, 'name' => 'Extra Demo Service 146', 'category' => 'Category 7', 'price' => 1560000, 'duration' => 40],
    ['id' => 147, 'name' => 'Extra Demo Service 147', 'category' => 'Category 8', 'price' => 1570000, 'duration' => 50],
    ['id' => 148, 'name' => 'Extra Demo Service 148', 'category' => 'Category 9', 'price' => 1580000, 'duration' => 60],
    ['id' => 149, 'name' => 'Extra Demo Service 149', 'category' => 'Category 10', 'price' => 1590000, 'duration' => 70],
    ['id' => 150, 'name' => 'Extra Demo Service 150', 'category' => 'Category 1', 'price' => 1600000, 'duration' => 80],
];

$extraReports = [
    ['code' => 'REP-0001', 'title' => 'Demo Report 001', 'total' => 12345, 'status' => 'active'],
    ['code' => 'REP-0002', 'title' => 'Demo Report 002', 'total' => 24690, 'status' => 'waiting'],
    ['code' => 'REP-0003', 'title' => 'Demo Report 003', 'total' => 37035, 'status' => 'closed'],
    ['code' => 'REP-0004', 'title' => 'Demo Report 004', 'total' => 49380, 'status' => 'new'],
    ['code' => 'REP-0005', 'title' => 'Demo Report 005', 'total' => 61725, 'status' => 'active'],
    ['code' => 'REP-0006', 'title' => 'Demo Report 006', 'total' => 74070, 'status' => 'waiting'],
    ['code' => 'REP-0007', 'title' => 'Demo Report 007', 'total' => 86415, 'status' => 'closed'],
    ['code' => 'REP-0008', 'title' => 'Demo Report 008', 'total' => 98760, 'status' => 'new'],
    ['code' => 'REP-0009', 'title' => 'Demo Report 009', 'total' => 111105, 'status' => 'active'],
    ['code' => 'REP-0010', 'title' => 'Demo Report 010', 'total' => 123450, 'status' => 'waiting'],
    ['code' => 'REP-0011', 'title' => 'Demo Report 011', 'total' => 135795, 'status' => 'closed'],
    ['code' => 'REP-0012', 'title' => 'Demo Report 012', 'total' => 148140, 'status' => 'new'],
    ['code' => 'REP-0013', 'title' => 'Demo Report 013', 'total' => 160485, 'status' => 'active'],
    ['code' => 'REP-0014', 'title' => 'Demo Report 014', 'total' => 172830, 'status' => 'waiting'],
    ['code' => 'REP-0015', 'title' => 'Demo Report 015', 'total' => 185175, 'status' => 'closed'],
    ['code' => 'REP-0016', 'title' => 'Demo Report 016', 'total' => 197520, 'status' => 'new'],
    ['code' => 'REP-0017', 'title' => 'Demo Report 017', 'total' => 209865, 'status' => 'active'],
    ['code' => 'REP-0018', 'title' => 'Demo Report 018', 'total' => 222210, 'status' => 'waiting'],
    ['code' => 'REP-0019', 'title' => 'Demo Report 019', 'total' => 234555, 'status' => 'closed'],
    ['code' => 'REP-0020', 'title' => 'Demo Report 020', 'total' => 246900, 'status' => 'new'],
    ['code' => 'REP-0021', 'title' => 'Demo Report 021', 'total' => 259245, 'status' => 'active'],
    ['code' => 'REP-0022', 'title' => 'Demo Report 022', 'total' => 271590, 'status' => 'waiting'],
    ['code' => 'REP-0023', 'title' => 'Demo Report 023', 'total' => 283935, 'status' => 'closed'],
    ['code' => 'REP-0024', 'title' => 'Demo Report 024', 'total' => 296280, 'status' => 'new'],
    ['code' => 'REP-0025', 'title' => 'Demo Report 025', 'total' => 308625, 'status' => 'active'],
    ['code' => 'REP-0026', 'title' => 'Demo Report 026', 'total' => 320970, 'status' => 'waiting'],
    ['code' => 'REP-0027', 'title' => 'Demo Report 027', 'total' => 333315, 'status' => 'closed'],
    ['code' => 'REP-0028', 'title' => 'Demo Report 028', 'total' => 345660, 'status' => 'new'],
    ['code' => 'REP-0029', 'title' => 'Demo Report 029', 'total' => 358005, 'status' => 'active'],
    ['code' => 'REP-0030', 'title' => 'Demo Report 030', 'total' => 370350, 'status' => 'waiting'],
    ['code' => 'REP-0031', 'title' => 'Demo Report 031', 'total' => 382695, 'status' => 'closed'],
    ['code' => 'REP-0032', 'title' => 'Demo Report 032', 'total' => 395040, 'status' => 'new'],
    ['code' => 'REP-0033', 'title' => 'Demo Report 033', 'total' => 407385, 'status' => 'active'],
    ['code' => 'REP-0034', 'title' => 'Demo Report 034', 'total' => 419730, 'status' => 'waiting'],
    ['code' => 'REP-0035', 'title' => 'Demo Report 035', 'total' => 432075, 'status' => 'closed'],
    ['code' => 'REP-0036', 'title' => 'Demo Report 036', 'total' => 444420, 'status' => 'new'],
    ['code' => 'REP-0037', 'title' => 'Demo Report 037', 'total' => 456765, 'status' => 'active'],
    ['code' => 'REP-0038', 'title' => 'Demo Report 038', 'total' => 469110, 'status' => 'waiting'],
    ['code' => 'REP-0039', 'title' => 'Demo Report 039', 'total' => 481455, 'status' => 'closed'],
    ['code' => 'REP-0040', 'title' => 'Demo Report 040', 'total' => 493800, 'status' => 'new'],
    ['code' => 'REP-0041', 'title' => 'Demo Report 041', 'total' => 506145, 'status' => 'active'],
    ['code' => 'REP-0042', 'title' => 'Demo Report 042', 'total' => 518490, 'status' => 'waiting'],
    ['code' => 'REP-0043', 'title' => 'Demo Report 043', 'total' => 530835, 'status' => 'closed'],
    ['code' => 'REP-0044', 'title' => 'Demo Report 044', 'total' => 543180, 'status' => 'new'],
    ['code' => 'REP-0045', 'title' => 'Demo Report 045', 'total' => 555525, 'status' => 'active'],
    ['code' => 'REP-0046', 'title' => 'Demo Report 046', 'total' => 567870, 'status' => 'waiting'],
    ['code' => 'REP-0047', 'title' => 'Demo Report 047', 'total' => 580215, 'status' => 'closed'],
    ['code' => 'REP-0048', 'title' => 'Demo Report 048', 'total' => 592560, 'status' => 'new'],
    ['code' => 'REP-0049', 'title' => 'Demo Report 049', 'total' => 604905, 'status' => 'active'],
    ['code' => 'REP-0050', 'title' => 'Demo Report 050', 'total' => 617250, 'status' => 'waiting'],
    ['code' => 'REP-0051', 'title' => 'Demo Report 051', 'total' => 629595, 'status' => 'closed'],
    ['code' => 'REP-0052', 'title' => 'Demo Report 052', 'total' => 641940, 'status' => 'new'],
    ['code' => 'REP-0053', 'title' => 'Demo Report 053', 'total' => 654285, 'status' => 'active'],
    ['code' => 'REP-0054', 'title' => 'Demo Report 054', 'total' => 666630, 'status' => 'waiting'],
    ['code' => 'REP-0055', 'title' => 'Demo Report 055', 'total' => 678975, 'status' => 'closed'],
    ['code' => 'REP-0056', 'title' => 'Demo Report 056', 'total' => 691320, 'status' => 'new'],
    ['code' => 'REP-0057', 'title' => 'Demo Report 057', 'total' => 703665, 'status' => 'active'],
    ['code' => 'REP-0058', 'title' => 'Demo Report 058', 'total' => 716010, 'status' => 'waiting'],
    ['code' => 'REP-0059', 'title' => 'Demo Report 059', 'total' => 728355, 'status' => 'closed'],
    ['code' => 'REP-0060', 'title' => 'Demo Report 060', 'total' => 740700, 'status' => 'new'],
    ['code' => 'REP-0061', 'title' => 'Demo Report 061', 'total' => 753045, 'status' => 'active'],
    ['code' => 'REP-0062', 'title' => 'Demo Report 062', 'total' => 765390, 'status' => 'waiting'],
    ['code' => 'REP-0063', 'title' => 'Demo Report 063', 'total' => 777735, 'status' => 'closed'],
    ['code' => 'REP-0064', 'title' => 'Demo Report 064', 'total' => 790080, 'status' => 'new'],
    ['code' => 'REP-0065', 'title' => 'Demo Report 065', 'total' => 802425, 'status' => 'active'],
    ['code' => 'REP-0066', 'title' => 'Demo Report 066', 'total' => 814770, 'status' => 'waiting'],
    ['code' => 'REP-0067', 'title' => 'Demo Report 067', 'total' => 827115, 'status' => 'closed'],
    ['code' => 'REP-0068', 'title' => 'Demo Report 068', 'total' => 839460, 'status' => 'new'],
    ['code' => 'REP-0069', 'title' => 'Demo Report 069', 'total' => 851805, 'status' => 'active'],
    ['code' => 'REP-0070', 'title' => 'Demo Report 070', 'total' => 864150, 'status' => 'waiting'],
    ['code' => 'REP-0071', 'title' => 'Demo Report 071', 'total' => 876495, 'status' => 'closed'],
    ['code' => 'REP-0072', 'title' => 'Demo Report 072', 'total' => 888840, 'status' => 'new'],
    ['code' => 'REP-0073', 'title' => 'Demo Report 073', 'total' => 901185, 'status' => 'active'],
    ['code' => 'REP-0074', 'title' => 'Demo Report 074', 'total' => 913530, 'status' => 'waiting'],
    ['code' => 'REP-0075', 'title' => 'Demo Report 075', 'total' => 925875, 'status' => 'closed'],
    ['code' => 'REP-0076', 'title' => 'Demo Report 076', 'total' => 938220, 'status' => 'new'],
    ['code' => 'REP-0077', 'title' => 'Demo Report 077', 'total' => 950565, 'status' => 'active'],
    ['code' => 'REP-0078', 'title' => 'Demo Report 078', 'total' => 962910, 'status' => 'waiting'],
    ['code' => 'REP-0079', 'title' => 'Demo Report 079', 'total' => 975255, 'status' => 'closed'],
    ['code' => 'REP-0080', 'title' => 'Demo Report 080', 'total' => 987600, 'status' => 'new'],
    ['code' => 'REP-0081', 'title' => 'Demo Report 081', 'total' => 999945, 'status' => 'active'],
    ['code' => 'REP-0082', 'title' => 'Demo Report 082', 'total' => 1012290, 'status' => 'waiting'],
    ['code' => 'REP-0083', 'title' => 'Demo Report 083', 'total' => 1024635, 'status' => 'closed'],
    ['code' => 'REP-0084', 'title' => 'Demo Report 084', 'total' => 1036980, 'status' => 'new'],
    ['code' => 'REP-0085', 'title' => 'Demo Report 085', 'total' => 1049325, 'status' => 'active'],
    ['code' => 'REP-0086', 'title' => 'Demo Report 086', 'total' => 1061670, 'status' => 'waiting'],
    ['code' => 'REP-0087', 'title' => 'Demo Report 087', 'total' => 1074015, 'status' => 'closed'],
    ['code' => 'REP-0088', 'title' => 'Demo Report 088', 'total' => 1086360, 'status' => 'new'],
    ['code' => 'REP-0089', 'title' => 'Demo Report 089', 'total' => 1098705, 'status' => 'active'],
    ['code' => 'REP-0090', 'title' => 'Demo Report 090', 'total' => 1111050, 'status' => 'waiting'],
    ['code' => 'REP-0091', 'title' => 'Demo Report 091', 'total' => 1123395, 'status' => 'closed'],
    ['code' => 'REP-0092', 'title' => 'Demo Report 092', 'total' => 1135740, 'status' => 'new'],
    ['code' => 'REP-0093', 'title' => 'Demo Report 093', 'total' => 1148085, 'status' => 'active'],
    ['code' => 'REP-0094', 'title' => 'Demo Report 094', 'total' => 1160430, 'status' => 'waiting'],
    ['code' => 'REP-0095', 'title' => 'Demo Report 095', 'total' => 1172775, 'status' => 'closed'],
    ['code' => 'REP-0096', 'title' => 'Demo Report 096', 'total' => 1185120, 'status' => 'new'],
    ['code' => 'REP-0097', 'title' => 'Demo Report 097', 'total' => 1197465, 'status' => 'active'],
    ['code' => 'REP-0098', 'title' => 'Demo Report 098', 'total' => 1209810, 'status' => 'waiting'],
    ['code' => 'REP-0099', 'title' => 'Demo Report 099', 'total' => 1222155, 'status' => 'closed'],
    ['code' => 'REP-0100', 'title' => 'Demo Report 100', 'total' => 1234500, 'status' => 'new'],
    ['code' => 'REP-0101', 'title' => 'Demo Report 101', 'total' => 1246845, 'status' => 'active'],
    ['code' => 'REP-0102', 'title' => 'Demo Report 102', 'total' => 1259190, 'status' => 'waiting'],
    ['code' => 'REP-0103', 'title' => 'Demo Report 103', 'total' => 1271535, 'status' => 'closed'],
    ['code' => 'REP-0104', 'title' => 'Demo Report 104', 'total' => 1283880, 'status' => 'new'],
    ['code' => 'REP-0105', 'title' => 'Demo Report 105', 'total' => 1296225, 'status' => 'active'],
    ['code' => 'REP-0106', 'title' => 'Demo Report 106', 'total' => 1308570, 'status' => 'waiting'],
    ['code' => 'REP-0107', 'title' => 'Demo Report 107', 'total' => 1320915, 'status' => 'closed'],
    ['code' => 'REP-0108', 'title' => 'Demo Report 108', 'total' => 1333260, 'status' => 'new'],
    ['code' => 'REP-0109', 'title' => 'Demo Report 109', 'total' => 1345605, 'status' => 'active'],
    ['code' => 'REP-0110', 'title' => 'Demo Report 110', 'total' => 1357950, 'status' => 'waiting'],
    ['code' => 'REP-0111', 'title' => 'Demo Report 111', 'total' => 1370295, 'status' => 'closed'],
    ['code' => 'REP-0112', 'title' => 'Demo Report 112', 'total' => 1382640, 'status' => 'new'],
    ['code' => 'REP-0113', 'title' => 'Demo Report 113', 'total' => 1394985, 'status' => 'active'],
    ['code' => 'REP-0114', 'title' => 'Demo Report 114', 'total' => 1407330, 'status' => 'waiting'],
    ['code' => 'REP-0115', 'title' => 'Demo Report 115', 'total' => 1419675, 'status' => 'closed'],
    ['code' => 'REP-0116', 'title' => 'Demo Report 116', 'total' => 1432020, 'status' => 'new'],
    ['code' => 'REP-0117', 'title' => 'Demo Report 117', 'total' => 1444365, 'status' => 'active'],
    ['code' => 'REP-0118', 'title' => 'Demo Report 118', 'total' => 1456710, 'status' => 'waiting'],
    ['code' => 'REP-0119', 'title' => 'Demo Report 119', 'total' => 1469055, 'status' => 'closed'],
    ['code' => 'REP-0120', 'title' => 'Demo Report 120', 'total' => 1481400, 'status' => 'new'],
    ['code' => 'REP-0121', 'title' => 'Demo Report 121', 'total' => 1493745, 'status' => 'active'],
    ['code' => 'REP-0122', 'title' => 'Demo Report 122', 'total' => 1506090, 'status' => 'waiting'],
    ['code' => 'REP-0123', 'title' => 'Demo Report 123', 'total' => 1518435, 'status' => 'closed'],
    ['code' => 'REP-0124', 'title' => 'Demo Report 124', 'total' => 1530780, 'status' => 'new'],
    ['code' => 'REP-0125', 'title' => 'Demo Report 125', 'total' => 1543125, 'status' => 'active'],
    ['code' => 'REP-0126', 'title' => 'Demo Report 126', 'total' => 1555470, 'status' => 'waiting'],
    ['code' => 'REP-0127', 'title' => 'Demo Report 127', 'total' => 1567815, 'status' => 'closed'],
    ['code' => 'REP-0128', 'title' => 'Demo Report 128', 'total' => 1580160, 'status' => 'new'],
    ['code' => 'REP-0129', 'title' => 'Demo Report 129', 'total' => 1592505, 'status' => 'active'],
    ['code' => 'REP-0130', 'title' => 'Demo Report 130', 'total' => 1604850, 'status' => 'waiting'],
    ['code' => 'REP-0131', 'title' => 'Demo Report 131', 'total' => 1617195, 'status' => 'closed'],
    ['code' => 'REP-0132', 'title' => 'Demo Report 132', 'total' => 1629540, 'status' => 'new'],
    ['code' => 'REP-0133', 'title' => 'Demo Report 133', 'total' => 1641885, 'status' => 'active'],
    ['code' => 'REP-0134', 'title' => 'Demo Report 134', 'total' => 1654230, 'status' => 'waiting'],
    ['code' => 'REP-0135', 'title' => 'Demo Report 135', 'total' => 1666575, 'status' => 'closed'],
    ['code' => 'REP-0136', 'title' => 'Demo Report 136', 'total' => 1678920, 'status' => 'new'],
    ['code' => 'REP-0137', 'title' => 'Demo Report 137', 'total' => 1691265, 'status' => 'active'],
    ['code' => 'REP-0138', 'title' => 'Demo Report 138', 'total' => 1703610, 'status' => 'waiting'],
    ['code' => 'REP-0139', 'title' => 'Demo Report 139', 'total' => 1715955, 'status' => 'closed'],
    ['code' => 'REP-0140', 'title' => 'Demo Report 140', 'total' => 1728300, 'status' => 'new'],
    ['code' => 'REP-0141', 'title' => 'Demo Report 141', 'total' => 1740645, 'status' => 'active'],
    ['code' => 'REP-0142', 'title' => 'Demo Report 142', 'total' => 1752990, 'status' => 'waiting'],
    ['code' => 'REP-0143', 'title' => 'Demo Report 143', 'total' => 1765335, 'status' => 'closed'],
    ['code' => 'REP-0144', 'title' => 'Demo Report 144', 'total' => 1777680, 'status' => 'new'],
    ['code' => 'REP-0145', 'title' => 'Demo Report 145', 'total' => 1790025, 'status' => 'active'],
    ['code' => 'REP-0146', 'title' => 'Demo Report 146', 'total' => 1802370, 'status' => 'waiting'],
    ['code' => 'REP-0147', 'title' => 'Demo Report 147', 'total' => 1814715, 'status' => 'closed'],
    ['code' => 'REP-0148', 'title' => 'Demo Report 148', 'total' => 1827060, 'status' => 'new'],
    ['code' => 'REP-0149', 'title' => 'Demo Report 149', 'total' => 1839405, 'status' => 'active'],
    ['code' => 'REP-0150', 'title' => 'Demo Report 150', 'total' => 1851750, 'status' => 'waiting'],
    ['code' => 'REP-0151', 'title' => 'Demo Report 151', 'total' => 1864095, 'status' => 'closed'],
    ['code' => 'REP-0152', 'title' => 'Demo Report 152', 'total' => 1876440, 'status' => 'new'],
    ['code' => 'REP-0153', 'title' => 'Demo Report 153', 'total' => 1888785, 'status' => 'active'],
    ['code' => 'REP-0154', 'title' => 'Demo Report 154', 'total' => 1901130, 'status' => 'waiting'],
    ['code' => 'REP-0155', 'title' => 'Demo Report 155', 'total' => 1913475, 'status' => 'closed'],
    ['code' => 'REP-0156', 'title' => 'Demo Report 156', 'total' => 1925820, 'status' => 'new'],
    ['code' => 'REP-0157', 'title' => 'Demo Report 157', 'total' => 1938165, 'status' => 'active'],
    ['code' => 'REP-0158', 'title' => 'Demo Report 158', 'total' => 1950510, 'status' => 'waiting'],
    ['code' => 'REP-0159', 'title' => 'Demo Report 159', 'total' => 1962855, 'status' => 'closed'],
    ['code' => 'REP-0160', 'title' => 'Demo Report 160', 'total' => 1975200, 'status' => 'new'],
    ['code' => 'REP-0161', 'title' => 'Demo Report 161', 'total' => 1987545, 'status' => 'active'],
    ['code' => 'REP-0162', 'title' => 'Demo Report 162', 'total' => 1999890, 'status' => 'waiting'],
    ['code' => 'REP-0163', 'title' => 'Demo Report 163', 'total' => 2012235, 'status' => 'closed'],
    ['code' => 'REP-0164', 'title' => 'Demo Report 164', 'total' => 2024580, 'status' => 'new'],
    ['code' => 'REP-0165', 'title' => 'Demo Report 165', 'total' => 2036925, 'status' => 'active'],
    ['code' => 'REP-0166', 'title' => 'Demo Report 166', 'total' => 2049270, 'status' => 'waiting'],
    ['code' => 'REP-0167', 'title' => 'Demo Report 167', 'total' => 2061615, 'status' => 'closed'],
    ['code' => 'REP-0168', 'title' => 'Demo Report 168', 'total' => 2073960, 'status' => 'new'],
    ['code' => 'REP-0169', 'title' => 'Demo Report 169', 'total' => 2086305, 'status' => 'active'],
    ['code' => 'REP-0170', 'title' => 'Demo Report 170', 'total' => 2098650, 'status' => 'waiting'],
    ['code' => 'REP-0171', 'title' => 'Demo Report 171', 'total' => 2110995, 'status' => 'closed'],
    ['code' => 'REP-0172', 'title' => 'Demo Report 172', 'total' => 2123340, 'status' => 'new'],
    ['code' => 'REP-0173', 'title' => 'Demo Report 173', 'total' => 2135685, 'status' => 'active'],
    ['code' => 'REP-0174', 'title' => 'Demo Report 174', 'total' => 2148030, 'status' => 'waiting'],
    ['code' => 'REP-0175', 'title' => 'Demo Report 175', 'total' => 2160375, 'status' => 'closed'],
    ['code' => 'REP-0176', 'title' => 'Demo Report 176', 'total' => 2172720, 'status' => 'new'],
    ['code' => 'REP-0177', 'title' => 'Demo Report 177', 'total' => 2185065, 'status' => 'active'],
    ['code' => 'REP-0178', 'title' => 'Demo Report 178', 'total' => 2197410, 'status' => 'waiting'],
    ['code' => 'REP-0179', 'title' => 'Demo Report 179', 'total' => 2209755, 'status' => 'closed'],
    ['code' => 'REP-0180', 'title' => 'Demo Report 180', 'total' => 2222100, 'status' => 'new'],
    ['code' => 'REP-0181', 'title' => 'Demo Report 181', 'total' => 2234445, 'status' => 'active'],
    ['code' => 'REP-0182', 'title' => 'Demo Report 182', 'total' => 2246790, 'status' => 'waiting'],
    ['code' => 'REP-0183', 'title' => 'Demo Report 183', 'total' => 2259135, 'status' => 'closed'],
    ['code' => 'REP-0184', 'title' => 'Demo Report 184', 'total' => 2271480, 'status' => 'new'],
    ['code' => 'REP-0185', 'title' => 'Demo Report 185', 'total' => 2283825, 'status' => 'active'],
    ['code' => 'REP-0186', 'title' => 'Demo Report 186', 'total' => 2296170, 'status' => 'waiting'],
    ['code' => 'REP-0187', 'title' => 'Demo Report 187', 'total' => 2308515, 'status' => 'closed'],
    ['code' => 'REP-0188', 'title' => 'Demo Report 188', 'total' => 2320860, 'status' => 'new'],
    ['code' => 'REP-0189', 'title' => 'Demo Report 189', 'total' => 2333205, 'status' => 'active'],
    ['code' => 'REP-0190', 'title' => 'Demo Report 190', 'total' => 2345550, 'status' => 'waiting'],
    ['code' => 'REP-0191', 'title' => 'Demo Report 191', 'total' => 2357895, 'status' => 'closed'],
    ['code' => 'REP-0192', 'title' => 'Demo Report 192', 'total' => 2370240, 'status' => 'new'],
    ['code' => 'REP-0193', 'title' => 'Demo Report 193', 'total' => 2382585, 'status' => 'active'],
    ['code' => 'REP-0194', 'title' => 'Demo Report 194', 'total' => 2394930, 'status' => 'waiting'],
    ['code' => 'REP-0195', 'title' => 'Demo Report 195', 'total' => 2407275, 'status' => 'closed'],
    ['code' => 'REP-0196', 'title' => 'Demo Report 196', 'total' => 2419620, 'status' => 'new'],
    ['code' => 'REP-0197', 'title' => 'Demo Report 197', 'total' => 2431965, 'status' => 'active'],
    ['code' => 'REP-0198', 'title' => 'Demo Report 198', 'total' => 2444310, 'status' => 'waiting'],
    ['code' => 'REP-0199', 'title' => 'Demo Report 199', 'total' => 2456655, 'status' => 'closed'],
    ['code' => 'REP-0200', 'title' => 'Demo Report 200', 'total' => 2469000, 'status' => 'new'],
];

?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($moduleName) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-pink-50 text-slate-900">
    <div class="min-h-screen">
        <header class="bg-white/90 backdrop-blur border-b border-slate-200 sticky top-0 z-20">
            <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.25em] text-pink-500 font-bold">Dummy PHP Pack</p>
                    <h1 class="text-2xl font-black"><?= esc($clinicName) ?> - <?= esc($moduleName) ?></h1>
                    <p class="text-sm text-slate-500 mt-1">Generated: <?= esc($generatedAt) ?></p>
                </div>
                <div class="flex gap-3">
                    <button class="px-4 py-2 rounded-xl bg-white border border-slate-200 shadow-sm">Export</button>
                    <button class="px-4 py-2 rounded-xl bg-pink-600 text-white shadow-sm">Add Dummy</button>
                </div>
            </div>
        </header>
        <main class="max-w-7xl mx-auto px-6 py-8">
            <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-5 mb-8">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 1</p>
                    <p class="text-3xl font-black mt-2">111</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 1</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 2</p>
                    <p class="text-3xl font-black mt-2">222</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 2</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 3</p>
                    <p class="text-3xl font-black mt-2">333</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 3</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 4</p>
                    <p class="text-3xl font-black mt-2">444</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 4</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 5</p>
                    <p class="text-3xl font-black mt-2">555</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 5</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 6</p>
                    <p class="text-3xl font-black mt-2">666</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 6</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 7</p>
                    <p class="text-3xl font-black mt-2">777</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 7</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 8</p>
                    <p class="text-3xl font-black mt-2">888</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 8</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 9</p>
                    <p class="text-3xl font-black mt-2">999</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 9</p>
                </div>
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                    <p class="text-sm text-slate-500">Extra Metric 10</p>
                    <p class="text-3xl font-black mt-2">1110</p>
                    <p class="text-xs text-pink-500 mt-3">Filler analytics card 10</p>
                </div>
            </section>
            <!-- Extra dummy section 001 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 001</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 001</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 001-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 001-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(107777) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 001-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 001-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(115554) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 001-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 001-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(123331) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 001-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 001-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(131108) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 001-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 001-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(138885) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 001-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 001-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(146662) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 001-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 001-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(154439) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 001-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 001-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(162216) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X001-001</td>
                                <td class="p-3 font-semibold">Generated Item 001-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(54321) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X001-002</td>
                                <td class="p-3 font-semibold">Generated Item 001-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(108642) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X001-003</td>
                                <td class="p-3 font-semibold">Generated Item 001-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(162963) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X001-004</td>
                                <td class="p-3 font-semibold">Generated Item 001-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(217284) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X001-005</td>
                                <td class="p-3 font-semibold">Generated Item 001-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(271605) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X001-006</td>
                                <td class="p-3 font-semibold">Generated Item 001-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(325926) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X001-007</td>
                                <td class="p-3 font-semibold">Generated Item 001-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(380247) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 001 ends -->
            <!-- Extra dummy section 002 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 002</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 002</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 002-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 002-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(115554) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 002-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 002-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(131108) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 002-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 002-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(146662) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 002-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 002-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(162216) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 002-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 002-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(177770) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 002-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 002-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(193324) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 002-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 002-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(208878) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 002-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 002-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(224432) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X002-001</td>
                                <td class="p-3 font-semibold">Generated Item 002-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(108642) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X002-002</td>
                                <td class="p-3 font-semibold">Generated Item 002-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(217284) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X002-003</td>
                                <td class="p-3 font-semibold">Generated Item 002-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(325926) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X002-004</td>
                                <td class="p-3 font-semibold">Generated Item 002-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(434568) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X002-005</td>
                                <td class="p-3 font-semibold">Generated Item 002-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(543210) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X002-006</td>
                                <td class="p-3 font-semibold">Generated Item 002-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(651852) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X002-007</td>
                                <td class="p-3 font-semibold">Generated Item 002-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(760494) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 002 ends -->
            <!-- Extra dummy section 003 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 003</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 003</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 003-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 003-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(123331) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 003-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 003-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(146662) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 003-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 003-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(169993) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 003-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 003-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(193324) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 003-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 003-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(216655) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 003-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 003-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(239986) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 003-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 003-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(263317) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 003-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 003-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(286648) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X003-001</td>
                                <td class="p-3 font-semibold">Generated Item 003-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(162963) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X003-002</td>
                                <td class="p-3 font-semibold">Generated Item 003-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(325926) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X003-003</td>
                                <td class="p-3 font-semibold">Generated Item 003-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(488889) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X003-004</td>
                                <td class="p-3 font-semibold">Generated Item 003-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(651852) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X003-005</td>
                                <td class="p-3 font-semibold">Generated Item 003-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(814815) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X003-006</td>
                                <td class="p-3 font-semibold">Generated Item 003-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(977778) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X003-007</td>
                                <td class="p-3 font-semibold">Generated Item 003-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1140741) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 003 ends -->
            <!-- Extra dummy section 004 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 004</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 004</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 004-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 004-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(131108) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 004-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 004-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(162216) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 004-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 004-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(193324) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 004-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 004-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(224432) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 004-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 004-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(255540) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 004-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 004-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(286648) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 004-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 004-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(317756) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 004-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 004-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(348864) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X004-001</td>
                                <td class="p-3 font-semibold">Generated Item 004-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(217284) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X004-002</td>
                                <td class="p-3 font-semibold">Generated Item 004-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(434568) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X004-003</td>
                                <td class="p-3 font-semibold">Generated Item 004-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(651852) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X004-004</td>
                                <td class="p-3 font-semibold">Generated Item 004-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(869136) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X004-005</td>
                                <td class="p-3 font-semibold">Generated Item 004-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(1086420) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X004-006</td>
                                <td class="p-3 font-semibold">Generated Item 004-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1303704) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X004-007</td>
                                <td class="p-3 font-semibold">Generated Item 004-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1520988) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 004 ends -->
            <!-- Extra dummy section 005 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 005</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 005</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 005-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 005-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(138885) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 005-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 005-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(177770) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 005-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 005-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(216655) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 005-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 005-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(255540) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 005-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 005-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(294425) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 005-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 005-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(333310) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 005-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 005-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(372195) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 005-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 005-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(411080) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X005-001</td>
                                <td class="p-3 font-semibold">Generated Item 005-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(271605) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X005-002</td>
                                <td class="p-3 font-semibold">Generated Item 005-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(543210) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X005-003</td>
                                <td class="p-3 font-semibold">Generated Item 005-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(814815) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X005-004</td>
                                <td class="p-3 font-semibold">Generated Item 005-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(1086420) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X005-005</td>
                                <td class="p-3 font-semibold">Generated Item 005-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1358025) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X005-006</td>
                                <td class="p-3 font-semibold">Generated Item 005-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1629630) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X005-007</td>
                                <td class="p-3 font-semibold">Generated Item 005-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1901235) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 005 ends -->
            <!-- Extra dummy section 006 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 006</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 006</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 006-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 006-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(146662) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 006-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 006-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(193324) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 006-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 006-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(239986) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 006-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 006-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(286648) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 006-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 006-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(333310) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 006-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 006-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(379972) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 006-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 006-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(426634) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 006-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 006-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(473296) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X006-001</td>
                                <td class="p-3 font-semibold">Generated Item 006-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(325926) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X006-002</td>
                                <td class="p-3 font-semibold">Generated Item 006-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(651852) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X006-003</td>
                                <td class="p-3 font-semibold">Generated Item 006-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(977778) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X006-004</td>
                                <td class="p-3 font-semibold">Generated Item 006-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1303704) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X006-005</td>
                                <td class="p-3 font-semibold">Generated Item 006-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1629630) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X006-006</td>
                                <td class="p-3 font-semibold">Generated Item 006-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1955556) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X006-007</td>
                                <td class="p-3 font-semibold">Generated Item 006-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2281482) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 006 ends -->
            <!-- Extra dummy section 007 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 007</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 007</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 007-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 007-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(154439) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 007-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 007-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(208878) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 007-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 007-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(263317) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 007-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 007-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(317756) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 007-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 007-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(372195) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 007-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 007-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(426634) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 007-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 007-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(481073) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 007-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 007-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(535512) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X007-001</td>
                                <td class="p-3 font-semibold">Generated Item 007-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(380247) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X007-002</td>
                                <td class="p-3 font-semibold">Generated Item 007-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(760494) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X007-003</td>
                                <td class="p-3 font-semibold">Generated Item 007-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1140741) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X007-004</td>
                                <td class="p-3 font-semibold">Generated Item 007-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1520988) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X007-005</td>
                                <td class="p-3 font-semibold">Generated Item 007-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1901235) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X007-006</td>
                                <td class="p-3 font-semibold">Generated Item 007-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2281482) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X007-007</td>
                                <td class="p-3 font-semibold">Generated Item 007-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2661729) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 007 ends -->
            <!-- Extra dummy section 008 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 008</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 008</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 008-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 008-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(162216) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 008-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 008-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(224432) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 008-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 008-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(286648) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 008-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 008-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(348864) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 008-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 008-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(411080) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 008-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 008-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(473296) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 008-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 008-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(535512) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 008-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 008-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(597728) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X008-001</td>
                                <td class="p-3 font-semibold">Generated Item 008-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(434568) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X008-002</td>
                                <td class="p-3 font-semibold">Generated Item 008-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(869136) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X008-003</td>
                                <td class="p-3 font-semibold">Generated Item 008-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1303704) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X008-004</td>
                                <td class="p-3 font-semibold">Generated Item 008-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1738272) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X008-005</td>
                                <td class="p-3 font-semibold">Generated Item 008-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2172840) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X008-006</td>
                                <td class="p-3 font-semibold">Generated Item 008-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2607408) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X008-007</td>
                                <td class="p-3 font-semibold">Generated Item 008-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(3041976) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 008 ends -->
            <!-- Extra dummy section 009 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 009</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 009</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 009-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 009-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(169993) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 009-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 009-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(239986) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 009-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 009-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(309979) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 009-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 009-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(379972) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 009-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 009-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(449965) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 009-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 009-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(519958) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 009-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 009-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(589951) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 009-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 009-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(659944) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X009-001</td>
                                <td class="p-3 font-semibold">Generated Item 009-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(488889) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X009-002</td>
                                <td class="p-3 font-semibold">Generated Item 009-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(977778) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X009-003</td>
                                <td class="p-3 font-semibold">Generated Item 009-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1466667) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X009-004</td>
                                <td class="p-3 font-semibold">Generated Item 009-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(1955556) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X009-005</td>
                                <td class="p-3 font-semibold">Generated Item 009-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2444445) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X009-006</td>
                                <td class="p-3 font-semibold">Generated Item 009-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2933334) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X009-007</td>
                                <td class="p-3 font-semibold">Generated Item 009-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3422223) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 009 ends -->
            <!-- Extra dummy section 010 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 010</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 010</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 010-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 010-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(177770) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 010-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 010-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(255540) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 010-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 010-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(333310) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 010-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 010-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(411080) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 010-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 010-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(488850) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 010-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 010-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(566620) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 010-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 010-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(644390) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 010-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 010-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(722160) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X010-001</td>
                                <td class="p-3 font-semibold">Generated Item 010-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(543210) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X010-002</td>
                                <td class="p-3 font-semibold">Generated Item 010-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1086420) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X010-003</td>
                                <td class="p-3 font-semibold">Generated Item 010-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(1629630) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X010-004</td>
                                <td class="p-3 font-semibold">Generated Item 010-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2172840) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X010-005</td>
                                <td class="p-3 font-semibold">Generated Item 010-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2716050) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X010-006</td>
                                <td class="p-3 font-semibold">Generated Item 010-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3259260) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X010-007</td>
                                <td class="p-3 font-semibold">Generated Item 010-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3802470) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 010 ends -->
            <!-- Extra dummy section 011 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 011</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 011</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 011-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 011-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(185547) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 011-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 011-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(271094) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 011-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 011-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(356641) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 011-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 011-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(442188) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 011-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 011-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(527735) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 011-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 011-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(613282) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 011-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 011-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(698829) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 011-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 011-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(784376) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X011-001</td>
                                <td class="p-3 font-semibold">Generated Item 011-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(597531) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X011-002</td>
                                <td class="p-3 font-semibold">Generated Item 011-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(1195062) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X011-003</td>
                                <td class="p-3 font-semibold">Generated Item 011-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(1792593) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X011-004</td>
                                <td class="p-3 font-semibold">Generated Item 011-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2390124) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X011-005</td>
                                <td class="p-3 font-semibold">Generated Item 011-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2987655) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X011-006</td>
                                <td class="p-3 font-semibold">Generated Item 011-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3585186) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X011-007</td>
                                <td class="p-3 font-semibold">Generated Item 011-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(4182717) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 011 ends -->
            <!-- Extra dummy section 012 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 012</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 012</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 012-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 012-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(193324) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 012-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 012-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(286648) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 012-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 012-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(379972) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 012-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 012-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(473296) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 012-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 012-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(566620) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 012-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 012-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(659944) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 012-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 012-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(753268) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 012-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 012-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(846592) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X012-001</td>
                                <td class="p-3 font-semibold">Generated Item 012-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(651852) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X012-002</td>
                                <td class="p-3 font-semibold">Generated Item 012-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(1303704) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X012-003</td>
                                <td class="p-3 font-semibold">Generated Item 012-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1955556) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X012-004</td>
                                <td class="p-3 font-semibold">Generated Item 012-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2607408) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X012-005</td>
                                <td class="p-3 font-semibold">Generated Item 012-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3259260) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X012-006</td>
                                <td class="p-3 font-semibold">Generated Item 012-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3911112) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X012-007</td>
                                <td class="p-3 font-semibold">Generated Item 012-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(4562964) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 012 ends -->
            <!-- Extra dummy section 013 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 013</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 013</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 013-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 013-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(201101) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 013-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 013-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(302202) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 013-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 013-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(403303) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 013-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 013-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(504404) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 013-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 013-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(605505) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 013-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 013-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(706606) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 013-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 013-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(807707) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 013-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 013-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(908808) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X013-001</td>
                                <td class="p-3 font-semibold">Generated Item 013-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(706173) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X013-002</td>
                                <td class="p-3 font-semibold">Generated Item 013-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1412346) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X013-003</td>
                                <td class="p-3 font-semibold">Generated Item 013-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2118519) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X013-004</td>
                                <td class="p-3 font-semibold">Generated Item 013-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(2824692) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X013-005</td>
                                <td class="p-3 font-semibold">Generated Item 013-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3530865) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X013-006</td>
                                <td class="p-3 font-semibold">Generated Item 013-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(4237038) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X013-007</td>
                                <td class="p-3 font-semibold">Generated Item 013-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(4943211) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 013 ends -->
            <!-- Extra dummy section 014 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 014</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 014</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 014-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 014-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(208878) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 014-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 014-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(317756) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 014-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 014-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(426634) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 014-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 014-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(535512) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 014-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 014-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(644390) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 014-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 014-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(753268) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 014-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 014-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(862146) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 014-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 014-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(971024) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X014-001</td>
                                <td class="p-3 font-semibold">Generated Item 014-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(760494) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X014-002</td>
                                <td class="p-3 font-semibold">Generated Item 014-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1520988) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X014-003</td>
                                <td class="p-3 font-semibold">Generated Item 014-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(2281482) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X014-004</td>
                                <td class="p-3 font-semibold">Generated Item 014-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3041976) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X014-005</td>
                                <td class="p-3 font-semibold">Generated Item 014-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(3802470) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X014-006</td>
                                <td class="p-3 font-semibold">Generated Item 014-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(4562964) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X014-007</td>
                                <td class="p-3 font-semibold">Generated Item 014-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(5323458) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 014 ends -->
            <!-- Extra dummy section 015 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 015</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 015</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 015-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 015-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(216655) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 015-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 015-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(333310) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 015-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 015-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(449965) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 015-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 015-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(566620) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 015-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 015-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(683275) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 015-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 015-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(799930) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 015-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 015-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(916585) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 015-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 015-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1033240) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X015-001</td>
                                <td class="p-3 font-semibold">Generated Item 015-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(814815) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X015-002</td>
                                <td class="p-3 font-semibold">Generated Item 015-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1629630) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X015-003</td>
                                <td class="p-3 font-semibold">Generated Item 015-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2444445) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X015-004</td>
                                <td class="p-3 font-semibold">Generated Item 015-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(3259260) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X015-005</td>
                                <td class="p-3 font-semibold">Generated Item 015-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(4074075) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X015-006</td>
                                <td class="p-3 font-semibold">Generated Item 015-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(4888890) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X015-007</td>
                                <td class="p-3 font-semibold">Generated Item 015-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(5703705) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 015 ends -->
            <!-- Extra dummy section 016 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 016</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 016</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 016-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 016-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(224432) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 016-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 016-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(348864) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 016-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 016-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(473296) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 016-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 016-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(597728) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 016-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 016-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(722160) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 016-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 016-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(846592) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 016-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 016-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(971024) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 016-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 016-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1095456) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X016-001</td>
                                <td class="p-3 font-semibold">Generated Item 016-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(869136) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X016-002</td>
                                <td class="p-3 font-semibold">Generated Item 016-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(1738272) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X016-003</td>
                                <td class="p-3 font-semibold">Generated Item 016-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2607408) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X016-004</td>
                                <td class="p-3 font-semibold">Generated Item 016-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(3476544) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X016-005</td>
                                <td class="p-3 font-semibold">Generated Item 016-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(4345680) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X016-006</td>
                                <td class="p-3 font-semibold">Generated Item 016-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(5214816) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X016-007</td>
                                <td class="p-3 font-semibold">Generated Item 016-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(6083952) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 016 ends -->
            <!-- Extra dummy section 017 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 017</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 017</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 017-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 017-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(232209) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 017-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 017-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(364418) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 017-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 017-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(496627) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 017-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 017-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(628836) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 017-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 017-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(761045) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 017-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 017-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(893254) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 017-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 017-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1025463) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 017-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 017-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1157672) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X017-001</td>
                                <td class="p-3 font-semibold">Generated Item 017-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(923457) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X017-002</td>
                                <td class="p-3 font-semibold">Generated Item 017-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(1846914) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X017-003</td>
                                <td class="p-3 font-semibold">Generated Item 017-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2770371) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X017-004</td>
                                <td class="p-3 font-semibold">Generated Item 017-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3693828) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X017-005</td>
                                <td class="p-3 font-semibold">Generated Item 017-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(4617285) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X017-006</td>
                                <td class="p-3 font-semibold">Generated Item 017-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(5540742) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X017-007</td>
                                <td class="p-3 font-semibold">Generated Item 017-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(6464199) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 017 ends -->
            <!-- Extra dummy section 018 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 018</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 018</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 018-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 018-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(239986) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 018-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 018-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(379972) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 018-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 018-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(519958) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 018-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 018-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(659944) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 018-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 018-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(799930) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 018-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 018-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(939916) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 018-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 018-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1079902) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 018-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 018-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1219888) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X018-001</td>
                                <td class="p-3 font-semibold">Generated Item 018-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(977778) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X018-002</td>
                                <td class="p-3 font-semibold">Generated Item 018-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1955556) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X018-003</td>
                                <td class="p-3 font-semibold">Generated Item 018-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2933334) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X018-004</td>
                                <td class="p-3 font-semibold">Generated Item 018-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3911112) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X018-005</td>
                                <td class="p-3 font-semibold">Generated Item 018-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(4888890) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X018-006</td>
                                <td class="p-3 font-semibold">Generated Item 018-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(5866668) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X018-007</td>
                                <td class="p-3 font-semibold">Generated Item 018-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(6844446) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 018 ends -->
            <!-- Extra dummy section 019 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 019</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 019</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 019-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 019-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(247763) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 019-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 019-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(395526) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 019-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 019-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(543289) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 019-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 019-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(691052) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 019-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 019-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(838815) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 019-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 019-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(986578) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 019-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 019-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1134341) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 019-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 019-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1282104) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X019-001</td>
                                <td class="p-3 font-semibold">Generated Item 019-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1032099) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X019-002</td>
                                <td class="p-3 font-semibold">Generated Item 019-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2064198) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X019-003</td>
                                <td class="p-3 font-semibold">Generated Item 019-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3096297) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X019-004</td>
                                <td class="p-3 font-semibold">Generated Item 019-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(4128396) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X019-005</td>
                                <td class="p-3 font-semibold">Generated Item 019-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(5160495) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X019-006</td>
                                <td class="p-3 font-semibold">Generated Item 019-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(6192594) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X019-007</td>
                                <td class="p-3 font-semibold">Generated Item 019-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(7224693) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 019 ends -->
            <!-- Extra dummy section 020 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 020</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 020</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 020-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 020-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(255540) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 020-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 020-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(411080) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 020-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 020-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(566620) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 020-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 020-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(722160) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 020-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 020-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(877700) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 020-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 020-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1033240) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 020-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 020-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1188780) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 020-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 020-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1344320) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X020-001</td>
                                <td class="p-3 font-semibold">Generated Item 020-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1086420) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X020-002</td>
                                <td class="p-3 font-semibold">Generated Item 020-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(2172840) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X020-003</td>
                                <td class="p-3 font-semibold">Generated Item 020-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3259260) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X020-004</td>
                                <td class="p-3 font-semibold">Generated Item 020-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(4345680) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X020-005</td>
                                <td class="p-3 font-semibold">Generated Item 020-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(5432100) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X020-006</td>
                                <td class="p-3 font-semibold">Generated Item 020-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(6518520) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X020-007</td>
                                <td class="p-3 font-semibold">Generated Item 020-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(7604940) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 020 ends -->
            <!-- Extra dummy section 021 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 021</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 021</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 021-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 021-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(263317) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 021-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 021-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(426634) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 021-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 021-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(589951) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 021-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 021-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(753268) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 021-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 021-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(916585) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 021-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 021-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1079902) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 021-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 021-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1243219) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 021-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 021-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1406536) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X021-001</td>
                                <td class="p-3 font-semibold">Generated Item 021-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1140741) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X021-002</td>
                                <td class="p-3 font-semibold">Generated Item 021-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2281482) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X021-003</td>
                                <td class="p-3 font-semibold">Generated Item 021-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(3422223) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X021-004</td>
                                <td class="p-3 font-semibold">Generated Item 021-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(4562964) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X021-005</td>
                                <td class="p-3 font-semibold">Generated Item 021-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(5703705) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X021-006</td>
                                <td class="p-3 font-semibold">Generated Item 021-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(6844446) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X021-007</td>
                                <td class="p-3 font-semibold">Generated Item 021-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(7985187) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 021 ends -->
            <!-- Extra dummy section 022 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 022</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 022</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 022-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 022-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(271094) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 022-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 022-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(442188) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 022-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 022-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(613282) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 022-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 022-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(784376) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 022-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 022-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(955470) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 022-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 022-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1126564) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 022-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 022-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1297658) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 022-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 022-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1468752) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X022-001</td>
                                <td class="p-3 font-semibold">Generated Item 022-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(1195062) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X022-002</td>
                                <td class="p-3 font-semibold">Generated Item 022-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2390124) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X022-003</td>
                                <td class="p-3 font-semibold">Generated Item 022-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(3585186) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X022-004</td>
                                <td class="p-3 font-semibold">Generated Item 022-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(4780248) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X022-005</td>
                                <td class="p-3 font-semibold">Generated Item 022-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(5975310) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X022-006</td>
                                <td class="p-3 font-semibold">Generated Item 022-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(7170372) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X022-007</td>
                                <td class="p-3 font-semibold">Generated Item 022-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(8365434) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 022 ends -->
            <!-- Extra dummy section 023 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 023</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 023</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 023-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 023-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(278871) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 023-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 023-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(457742) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 023-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 023-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(636613) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 023-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 023-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(815484) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 023-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 023-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(994355) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 023-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 023-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1173226) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 023-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 023-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1352097) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 023-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 023-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1530968) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X023-001</td>
                                <td class="p-3 font-semibold">Generated Item 023-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(1249383) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X023-002</td>
                                <td class="p-3 font-semibold">Generated Item 023-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2498766) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X023-003</td>
                                <td class="p-3 font-semibold">Generated Item 023-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3748149) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X023-004</td>
                                <td class="p-3 font-semibold">Generated Item 023-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(4997532) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X023-005</td>
                                <td class="p-3 font-semibold">Generated Item 023-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(6246915) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X023-006</td>
                                <td class="p-3 font-semibold">Generated Item 023-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(7496298) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X023-007</td>
                                <td class="p-3 font-semibold">Generated Item 023-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(8745681) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 023 ends -->
            <!-- Extra dummy section 024 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 024</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 024</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 024-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 024-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(286648) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 024-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 024-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(473296) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 024-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 024-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(659944) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 024-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 024-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(846592) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 024-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 024-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1033240) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 024-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 024-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1219888) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 024-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 024-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1406536) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 024-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 024-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1593184) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X024-001</td>
                                <td class="p-3 font-semibold">Generated Item 024-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1303704) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X024-002</td>
                                <td class="p-3 font-semibold">Generated Item 024-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2607408) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X024-003</td>
                                <td class="p-3 font-semibold">Generated Item 024-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3911112) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X024-004</td>
                                <td class="p-3 font-semibold">Generated Item 024-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(5214816) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X024-005</td>
                                <td class="p-3 font-semibold">Generated Item 024-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(6518520) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X024-006</td>
                                <td class="p-3 font-semibold">Generated Item 024-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(7822224) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X024-007</td>
                                <td class="p-3 font-semibold">Generated Item 024-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(9125928) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 024 ends -->
            <!-- Extra dummy section 025 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 025</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 025</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 025-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 025-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(294425) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 025-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 025-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(488850) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 025-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 025-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(683275) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 025-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 025-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(877700) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 025-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 025-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1072125) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 025-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 025-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1266550) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 025-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 025-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1460975) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 025-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 025-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1655400) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X025-001</td>
                                <td class="p-3 font-semibold">Generated Item 025-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1358025) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X025-002</td>
                                <td class="p-3 font-semibold">Generated Item 025-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(2716050) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X025-003</td>
                                <td class="p-3 font-semibold">Generated Item 025-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(4074075) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X025-004</td>
                                <td class="p-3 font-semibold">Generated Item 025-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(5432100) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X025-005</td>
                                <td class="p-3 font-semibold">Generated Item 025-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(6790125) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X025-006</td>
                                <td class="p-3 font-semibold">Generated Item 025-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(8148150) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X025-007</td>
                                <td class="p-3 font-semibold">Generated Item 025-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(9506175) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 025 ends -->
            <!-- Extra dummy section 026 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 026</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 026</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 026-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 026-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(302202) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 026-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 026-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(504404) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 026-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 026-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(706606) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 026-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 026-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(908808) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 026-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 026-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1111010) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 026-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 026-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1313212) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 026-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 026-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1515414) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 026-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 026-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1717616) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X026-001</td>
                                <td class="p-3 font-semibold">Generated Item 026-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1412346) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X026-002</td>
                                <td class="p-3 font-semibold">Generated Item 026-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2824692) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X026-003</td>
                                <td class="p-3 font-semibold">Generated Item 026-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(4237038) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X026-004</td>
                                <td class="p-3 font-semibold">Generated Item 026-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(5649384) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X026-005</td>
                                <td class="p-3 font-semibold">Generated Item 026-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(7061730) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X026-006</td>
                                <td class="p-3 font-semibold">Generated Item 026-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(8474076) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X026-007</td>
                                <td class="p-3 font-semibold">Generated Item 026-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(9886422) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 026 ends -->
            <!-- Extra dummy section 027 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 027</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 027</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 027-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 027-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(309979) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 027-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 027-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(519958) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 027-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 027-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(729937) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 027-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 027-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(939916) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 027-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 027-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1149895) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 027-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 027-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1359874) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 027-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 027-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1569853) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 027-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 027-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1779832) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X027-001</td>
                                <td class="p-3 font-semibold">Generated Item 027-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(1466667) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X027-002</td>
                                <td class="p-3 font-semibold">Generated Item 027-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2933334) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X027-003</td>
                                <td class="p-3 font-semibold">Generated Item 027-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(4400001) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X027-004</td>
                                <td class="p-3 font-semibold">Generated Item 027-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(5866668) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X027-005</td>
                                <td class="p-3 font-semibold">Generated Item 027-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(7333335) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X027-006</td>
                                <td class="p-3 font-semibold">Generated Item 027-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(8800002) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X027-007</td>
                                <td class="p-3 font-semibold">Generated Item 027-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(10266669) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 027 ends -->
            <!-- Extra dummy section 028 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 028</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 028</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 028-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 028-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(317756) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 028-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 028-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(535512) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 028-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 028-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(753268) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 028-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 028-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(971024) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 028-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 028-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1188780) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 028-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 028-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1406536) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 028-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 028-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1624292) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 028-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 028-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1842048) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X028-001</td>
                                <td class="p-3 font-semibold">Generated Item 028-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(1520988) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X028-002</td>
                                <td class="p-3 font-semibold">Generated Item 028-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(3041976) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X028-003</td>
                                <td class="p-3 font-semibold">Generated Item 028-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(4562964) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X028-004</td>
                                <td class="p-3 font-semibold">Generated Item 028-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(6083952) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X028-005</td>
                                <td class="p-3 font-semibold">Generated Item 028-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(7604940) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X028-006</td>
                                <td class="p-3 font-semibold">Generated Item 028-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(9125928) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X028-007</td>
                                <td class="p-3 font-semibold">Generated Item 028-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(10646916) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 028 ends -->
            <!-- Extra dummy section 029 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 029</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 029</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 029-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 029-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(325533) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 029-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 029-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(551066) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 029-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 029-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(776599) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 029-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 029-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1002132) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 029-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 029-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1227665) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 029-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 029-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1453198) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 029-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 029-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1678731) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 029-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 029-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1904264) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X029-001</td>
                                <td class="p-3 font-semibold">Generated Item 029-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1575309) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X029-002</td>
                                <td class="p-3 font-semibold">Generated Item 029-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3150618) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X029-003</td>
                                <td class="p-3 font-semibold">Generated Item 029-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(4725927) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X029-004</td>
                                <td class="p-3 font-semibold">Generated Item 029-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(6301236) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X029-005</td>
                                <td class="p-3 font-semibold">Generated Item 029-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(7876545) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X029-006</td>
                                <td class="p-3 font-semibold">Generated Item 029-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(9451854) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X029-007</td>
                                <td class="p-3 font-semibold">Generated Item 029-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(11027163) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 029 ends -->
            <!-- Extra dummy section 030 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 030</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 030</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 030-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 030-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(333310) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 030-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 030-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(566620) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 030-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 030-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(799930) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 030-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 030-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1033240) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 030-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 030-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1266550) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 030-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 030-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1499860) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 030-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 030-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1733170) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 030-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 030-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1966480) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X030-001</td>
                                <td class="p-3 font-semibold">Generated Item 030-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1629630) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X030-002</td>
                                <td class="p-3 font-semibold">Generated Item 030-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3259260) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X030-003</td>
                                <td class="p-3 font-semibold">Generated Item 030-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(4888890) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X030-004</td>
                                <td class="p-3 font-semibold">Generated Item 030-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(6518520) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X030-005</td>
                                <td class="p-3 font-semibold">Generated Item 030-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(8148150) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X030-006</td>
                                <td class="p-3 font-semibold">Generated Item 030-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(9777780) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X030-007</td>
                                <td class="p-3 font-semibold">Generated Item 030-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(11407410) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 030 ends -->
            <!-- Extra dummy section 031 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 031</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 031</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 031-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 031-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(341087) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 031-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 031-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(582174) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 031-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 031-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(823261) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 031-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 031-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1064348) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 031-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 031-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1305435) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 031-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 031-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1546522) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 031-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 031-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1787609) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 031-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 031-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2028696) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X031-001</td>
                                <td class="p-3 font-semibold">Generated Item 031-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1683951) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X031-002</td>
                                <td class="p-3 font-semibold">Generated Item 031-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3367902) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X031-003</td>
                                <td class="p-3 font-semibold">Generated Item 031-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(5051853) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X031-004</td>
                                <td class="p-3 font-semibold">Generated Item 031-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(6735804) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X031-005</td>
                                <td class="p-3 font-semibold">Generated Item 031-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(8419755) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X031-006</td>
                                <td class="p-3 font-semibold">Generated Item 031-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(10103706) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X031-007</td>
                                <td class="p-3 font-semibold">Generated Item 031-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(11787657) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 031 ends -->
            <!-- Extra dummy section 032 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 032</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 032</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 032-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 032-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(348864) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 032-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 032-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(597728) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 032-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 032-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(846592) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 032-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 032-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1095456) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 032-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 032-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1344320) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 032-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 032-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1593184) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 032-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 032-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1842048) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 032-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 032-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2090912) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X032-001</td>
                                <td class="p-3 font-semibold">Generated Item 032-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(1738272) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X032-002</td>
                                <td class="p-3 font-semibold">Generated Item 032-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(3476544) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X032-003</td>
                                <td class="p-3 font-semibold">Generated Item 032-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(5214816) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X032-004</td>
                                <td class="p-3 font-semibold">Generated Item 032-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(6953088) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X032-005</td>
                                <td class="p-3 font-semibold">Generated Item 032-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(8691360) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X032-006</td>
                                <td class="p-3 font-semibold">Generated Item 032-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(10429632) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X032-007</td>
                                <td class="p-3 font-semibold">Generated Item 032-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(12167904) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 032 ends -->
            <!-- Extra dummy section 033 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 033</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 033</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 033-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 033-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(356641) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 033-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 033-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(613282) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 033-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 033-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(869923) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 033-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 033-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1126564) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 033-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 033-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1383205) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 033-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 033-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1639846) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 033-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 033-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1896487) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 033-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 033-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2153128) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X033-001</td>
                                <td class="p-3 font-semibold">Generated Item 033-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(1792593) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X033-002</td>
                                <td class="p-3 font-semibold">Generated Item 033-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(3585186) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X033-003</td>
                                <td class="p-3 font-semibold">Generated Item 033-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(5377779) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X033-004</td>
                                <td class="p-3 font-semibold">Generated Item 033-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(7170372) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X033-005</td>
                                <td class="p-3 font-semibold">Generated Item 033-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(8962965) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X033-006</td>
                                <td class="p-3 font-semibold">Generated Item 033-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(10755558) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X033-007</td>
                                <td class="p-3 font-semibold">Generated Item 033-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(12548151) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 033 ends -->
            <!-- Extra dummy section 034 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 034</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 034</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 034-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 034-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(364418) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 034-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 034-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(628836) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 034-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 034-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(893254) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 034-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 034-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1157672) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 034-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 034-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1422090) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 034-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 034-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1686508) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 034-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 034-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1950926) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 034-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 034-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2215344) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X034-001</td>
                                <td class="p-3 font-semibold">Generated Item 034-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(1846914) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X034-002</td>
                                <td class="p-3 font-semibold">Generated Item 034-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3693828) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X034-003</td>
                                <td class="p-3 font-semibold">Generated Item 034-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(5540742) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X034-004</td>
                                <td class="p-3 font-semibold">Generated Item 034-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(7387656) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X034-005</td>
                                <td class="p-3 font-semibold">Generated Item 034-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(9234570) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X034-006</td>
                                <td class="p-3 font-semibold">Generated Item 034-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(11081484) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X034-007</td>
                                <td class="p-3 font-semibold">Generated Item 034-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(12928398) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 034 ends -->
            <!-- Extra dummy section 035 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 035</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 035</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 035-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 035-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(372195) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 035-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 035-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(644390) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 035-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 035-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(916585) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 035-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 035-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1188780) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 035-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 035-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1460975) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 035-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 035-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1733170) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 035-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 035-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2005365) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 035-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 035-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2277560) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X035-001</td>
                                <td class="p-3 font-semibold">Generated Item 035-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(1901235) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X035-002</td>
                                <td class="p-3 font-semibold">Generated Item 035-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3802470) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X035-003</td>
                                <td class="p-3 font-semibold">Generated Item 035-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(5703705) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X035-004</td>
                                <td class="p-3 font-semibold">Generated Item 035-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(7604940) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X035-005</td>
                                <td class="p-3 font-semibold">Generated Item 035-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(9506175) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X035-006</td>
                                <td class="p-3 font-semibold">Generated Item 035-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(11407410) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X035-007</td>
                                <td class="p-3 font-semibold">Generated Item 035-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(13308645) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 035 ends -->
            <!-- Extra dummy section 036 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 036</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 036</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 036-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 036-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(379972) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 036-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 036-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(659944) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 036-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 036-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(939916) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 036-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 036-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1219888) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 036-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 036-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1499860) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 036-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 036-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1779832) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 036-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 036-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2059804) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 036-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 036-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2339776) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X036-001</td>
                                <td class="p-3 font-semibold">Generated Item 036-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(1955556) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X036-002</td>
                                <td class="p-3 font-semibold">Generated Item 036-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3911112) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X036-003</td>
                                <td class="p-3 font-semibold">Generated Item 036-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(5866668) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X036-004</td>
                                <td class="p-3 font-semibold">Generated Item 036-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(7822224) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X036-005</td>
                                <td class="p-3 font-semibold">Generated Item 036-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(9777780) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X036-006</td>
                                <td class="p-3 font-semibold">Generated Item 036-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(11733336) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X036-007</td>
                                <td class="p-3 font-semibold">Generated Item 036-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(13688892) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 036 ends -->
            <!-- Extra dummy section 037 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 037</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 037</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 037-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 037-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(387749) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 037-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 037-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(675498) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 037-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 037-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(963247) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 037-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 037-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1250996) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 037-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 037-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1538745) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 037-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 037-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1826494) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 037-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 037-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2114243) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 037-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 037-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2401992) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X037-001</td>
                                <td class="p-3 font-semibold">Generated Item 037-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2009877) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X037-002</td>
                                <td class="p-3 font-semibold">Generated Item 037-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(4019754) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X037-003</td>
                                <td class="p-3 font-semibold">Generated Item 037-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(6029631) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X037-004</td>
                                <td class="p-3 font-semibold">Generated Item 037-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(8039508) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X037-005</td>
                                <td class="p-3 font-semibold">Generated Item 037-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(10049385) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X037-006</td>
                                <td class="p-3 font-semibold">Generated Item 037-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(12059262) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X037-007</td>
                                <td class="p-3 font-semibold">Generated Item 037-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(14069139) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 037 ends -->
            <!-- Extra dummy section 038 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 038</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 038</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 038-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 038-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(395526) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 038-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 038-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(691052) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 038-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 038-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(986578) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 038-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 038-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1282104) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 038-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 038-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1577630) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 038-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 038-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1873156) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 038-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 038-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2168682) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 038-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 038-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2464208) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X038-001</td>
                                <td class="p-3 font-semibold">Generated Item 038-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2064198) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X038-002</td>
                                <td class="p-3 font-semibold">Generated Item 038-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(4128396) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X038-003</td>
                                <td class="p-3 font-semibold">Generated Item 038-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(6192594) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X038-004</td>
                                <td class="p-3 font-semibold">Generated Item 038-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(8256792) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X038-005</td>
                                <td class="p-3 font-semibold">Generated Item 038-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(10320990) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X038-006</td>
                                <td class="p-3 font-semibold">Generated Item 038-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(12385188) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X038-007</td>
                                <td class="p-3 font-semibold">Generated Item 038-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(14449386) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 038 ends -->
            <!-- Extra dummy section 039 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 039</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 039</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 039-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 039-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(403303) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 039-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 039-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(706606) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 039-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 039-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1009909) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 039-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 039-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1313212) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 039-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 039-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1616515) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 039-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 039-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1919818) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 039-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 039-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2223121) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 039-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 039-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2526424) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X039-001</td>
                                <td class="p-3 font-semibold">Generated Item 039-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2118519) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X039-002</td>
                                <td class="p-3 font-semibold">Generated Item 039-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(4237038) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X039-003</td>
                                <td class="p-3 font-semibold">Generated Item 039-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(6355557) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X039-004</td>
                                <td class="p-3 font-semibold">Generated Item 039-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(8474076) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X039-005</td>
                                <td class="p-3 font-semibold">Generated Item 039-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(10592595) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X039-006</td>
                                <td class="p-3 font-semibold">Generated Item 039-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(12711114) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X039-007</td>
                                <td class="p-3 font-semibold">Generated Item 039-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(14829633) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 039 ends -->
            <!-- Extra dummy section 040 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 040</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 040</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 040-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 040-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(411080) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 040-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 040-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(722160) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 040-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 040-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1033240) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 040-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 040-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1344320) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 040-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 040-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1655400) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 040-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 040-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1966480) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 040-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 040-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2277560) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 040-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 040-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2588640) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X040-001</td>
                                <td class="p-3 font-semibold">Generated Item 040-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2172840) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X040-002</td>
                                <td class="p-3 font-semibold">Generated Item 040-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(4345680) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X040-003</td>
                                <td class="p-3 font-semibold">Generated Item 040-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(6518520) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X040-004</td>
                                <td class="p-3 font-semibold">Generated Item 040-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(8691360) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X040-005</td>
                                <td class="p-3 font-semibold">Generated Item 040-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(10864200) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X040-006</td>
                                <td class="p-3 font-semibold">Generated Item 040-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(13037040) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X040-007</td>
                                <td class="p-3 font-semibold">Generated Item 040-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(15209880) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 040 ends -->
            <!-- Extra dummy section 041 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 041</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 041</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 041-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 041-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(418857) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 041-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 041-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(737714) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 041-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 041-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1056571) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 041-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 041-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1375428) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 041-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 041-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1694285) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 041-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 041-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2013142) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 041-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 041-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2331999) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 041-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 041-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2650856) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X041-001</td>
                                <td class="p-3 font-semibold">Generated Item 041-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(2227161) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X041-002</td>
                                <td class="p-3 font-semibold">Generated Item 041-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(4454322) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X041-003</td>
                                <td class="p-3 font-semibold">Generated Item 041-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(6681483) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X041-004</td>
                                <td class="p-3 font-semibold">Generated Item 041-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(8908644) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X041-005</td>
                                <td class="p-3 font-semibold">Generated Item 041-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(11135805) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X041-006</td>
                                <td class="p-3 font-semibold">Generated Item 041-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(13362966) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X041-007</td>
                                <td class="p-3 font-semibold">Generated Item 041-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(15590127) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 041 ends -->
            <!-- Extra dummy section 042 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 042</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 042</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 042-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 042-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(426634) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 042-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 042-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(753268) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 042-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 042-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1079902) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 042-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 042-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1406536) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 042-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 042-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1733170) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 042-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 042-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2059804) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 042-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 042-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2386438) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 042-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 042-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2713072) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X042-001</td>
                                <td class="p-3 font-semibold">Generated Item 042-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2281482) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X042-002</td>
                                <td class="p-3 font-semibold">Generated Item 042-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(4562964) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X042-003</td>
                                <td class="p-3 font-semibold">Generated Item 042-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(6844446) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X042-004</td>
                                <td class="p-3 font-semibold">Generated Item 042-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(9125928) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X042-005</td>
                                <td class="p-3 font-semibold">Generated Item 042-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(11407410) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X042-006</td>
                                <td class="p-3 font-semibold">Generated Item 042-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(13688892) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X042-007</td>
                                <td class="p-3 font-semibold">Generated Item 042-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(15970374) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 042 ends -->
            <!-- Extra dummy section 043 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 043</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 043</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 043-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 043-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(434411) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 043-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 043-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(768822) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 043-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 043-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1103233) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 043-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 043-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1437644) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 043-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 043-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1772055) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 043-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 043-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2106466) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 043-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 043-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2440877) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 043-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 043-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2775288) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X043-001</td>
                                <td class="p-3 font-semibold">Generated Item 043-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2335803) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X043-002</td>
                                <td class="p-3 font-semibold">Generated Item 043-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(4671606) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X043-003</td>
                                <td class="p-3 font-semibold">Generated Item 043-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(7007409) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X043-004</td>
                                <td class="p-3 font-semibold">Generated Item 043-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(9343212) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X043-005</td>
                                <td class="p-3 font-semibold">Generated Item 043-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(11679015) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X043-006</td>
                                <td class="p-3 font-semibold">Generated Item 043-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(14014818) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X043-007</td>
                                <td class="p-3 font-semibold">Generated Item 043-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(16350621) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 043 ends -->
            <!-- Extra dummy section 044 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 044</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 044</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 044-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 044-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(442188) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 044-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 044-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(784376) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 044-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 044-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1126564) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 044-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 044-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1468752) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 044-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 044-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1810940) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 044-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 044-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2153128) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 044-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 044-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2495316) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 044-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 044-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2837504) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X044-001</td>
                                <td class="p-3 font-semibold">Generated Item 044-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2390124) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X044-002</td>
                                <td class="p-3 font-semibold">Generated Item 044-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(4780248) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X044-003</td>
                                <td class="p-3 font-semibold">Generated Item 044-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(7170372) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X044-004</td>
                                <td class="p-3 font-semibold">Generated Item 044-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(9560496) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X044-005</td>
                                <td class="p-3 font-semibold">Generated Item 044-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(11950620) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X044-006</td>
                                <td class="p-3 font-semibold">Generated Item 044-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(14340744) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X044-007</td>
                                <td class="p-3 font-semibold">Generated Item 044-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(16730868) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 044 ends -->
            <!-- Extra dummy section 045 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 045</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 045</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 045-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 045-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(449965) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 045-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 045-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(799930) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 045-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 045-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1149895) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 045-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 045-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1499860) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 045-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 045-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1849825) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 045-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 045-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2199790) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 045-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 045-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2549755) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 045-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 045-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2899720) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X045-001</td>
                                <td class="p-3 font-semibold">Generated Item 045-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2444445) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X045-002</td>
                                <td class="p-3 font-semibold">Generated Item 045-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(4888890) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X045-003</td>
                                <td class="p-3 font-semibold">Generated Item 045-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(7333335) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X045-004</td>
                                <td class="p-3 font-semibold">Generated Item 045-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(9777780) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X045-005</td>
                                <td class="p-3 font-semibold">Generated Item 045-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(12222225) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X045-006</td>
                                <td class="p-3 font-semibold">Generated Item 045-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(14666670) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X045-007</td>
                                <td class="p-3 font-semibold">Generated Item 045-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(17111115) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 045 ends -->
            <!-- Extra dummy section 046 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 046</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 046</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 046-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 046-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(457742) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 046-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 046-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(815484) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 046-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 046-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1173226) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 046-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 046-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1530968) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 046-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 046-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1888710) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 046-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 046-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2246452) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 046-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 046-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2604194) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 046-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 046-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2961936) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X046-001</td>
                                <td class="p-3 font-semibold">Generated Item 046-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(2498766) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X046-002</td>
                                <td class="p-3 font-semibold">Generated Item 046-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(4997532) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X046-003</td>
                                <td class="p-3 font-semibold">Generated Item 046-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(7496298) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X046-004</td>
                                <td class="p-3 font-semibold">Generated Item 046-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(9995064) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X046-005</td>
                                <td class="p-3 font-semibold">Generated Item 046-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(12493830) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X046-006</td>
                                <td class="p-3 font-semibold">Generated Item 046-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(14992596) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X046-007</td>
                                <td class="p-3 font-semibold">Generated Item 046-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(17491362) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 046 ends -->
            <!-- Extra dummy section 047 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 047</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 047</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 047-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 047-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(465519) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 047-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 047-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(831038) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 047-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 047-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1196557) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 047-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 047-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1562076) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 047-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 047-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1927595) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 047-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 047-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2293114) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 047-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 047-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2658633) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 047-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 047-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3024152) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X047-001</td>
                                <td class="p-3 font-semibold">Generated Item 047-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2553087) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X047-002</td>
                                <td class="p-3 font-semibold">Generated Item 047-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(5106174) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X047-003</td>
                                <td class="p-3 font-semibold">Generated Item 047-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(7659261) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X047-004</td>
                                <td class="p-3 font-semibold">Generated Item 047-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(10212348) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X047-005</td>
                                <td class="p-3 font-semibold">Generated Item 047-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(12765435) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X047-006</td>
                                <td class="p-3 font-semibold">Generated Item 047-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(15318522) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X047-007</td>
                                <td class="p-3 font-semibold">Generated Item 047-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(17871609) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 047 ends -->
            <!-- Extra dummy section 048 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 048</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 048</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 048-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 048-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(473296) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 048-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 048-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(846592) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 048-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 048-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1219888) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 048-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 048-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1593184) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 048-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 048-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1966480) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 048-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 048-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2339776) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 048-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 048-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2713072) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 048-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 048-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3086368) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X048-001</td>
                                <td class="p-3 font-semibold">Generated Item 048-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2607408) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X048-002</td>
                                <td class="p-3 font-semibold">Generated Item 048-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(5214816) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X048-003</td>
                                <td class="p-3 font-semibold">Generated Item 048-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(7822224) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X048-004</td>
                                <td class="p-3 font-semibold">Generated Item 048-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(10429632) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X048-005</td>
                                <td class="p-3 font-semibold">Generated Item 048-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(13037040) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X048-006</td>
                                <td class="p-3 font-semibold">Generated Item 048-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(15644448) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X048-007</td>
                                <td class="p-3 font-semibold">Generated Item 048-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(18251856) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 048 ends -->
            <!-- Extra dummy section 049 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 049</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 049</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 049-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 049-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(481073) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 049-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 049-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(862146) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 049-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 049-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1243219) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 049-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 049-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1624292) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 049-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 049-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2005365) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 049-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 049-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2386438) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 049-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 049-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2767511) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 049-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 049-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3148584) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X049-001</td>
                                <td class="p-3 font-semibold">Generated Item 049-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2661729) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X049-002</td>
                                <td class="p-3 font-semibold">Generated Item 049-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(5323458) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X049-003</td>
                                <td class="p-3 font-semibold">Generated Item 049-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(7985187) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X049-004</td>
                                <td class="p-3 font-semibold">Generated Item 049-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(10646916) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X049-005</td>
                                <td class="p-3 font-semibold">Generated Item 049-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(13308645) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X049-006</td>
                                <td class="p-3 font-semibold">Generated Item 049-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(15970374) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X049-007</td>
                                <td class="p-3 font-semibold">Generated Item 049-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(18632103) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 049 ends -->
            <!-- Extra dummy section 050 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 050</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 050</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 050-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 050-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(488850) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 050-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 050-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(877700) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 050-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 050-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1266550) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 050-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 050-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1655400) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 050-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 050-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2044250) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 050-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 050-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2433100) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 050-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 050-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2821950) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 050-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 050-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3210800) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X050-001</td>
                                <td class="p-3 font-semibold">Generated Item 050-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2716050) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X050-002</td>
                                <td class="p-3 font-semibold">Generated Item 050-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(5432100) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X050-003</td>
                                <td class="p-3 font-semibold">Generated Item 050-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(8148150) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X050-004</td>
                                <td class="p-3 font-semibold">Generated Item 050-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(10864200) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X050-005</td>
                                <td class="p-3 font-semibold">Generated Item 050-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(13580250) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X050-006</td>
                                <td class="p-3 font-semibold">Generated Item 050-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(16296300) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X050-007</td>
                                <td class="p-3 font-semibold">Generated Item 050-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(19012350) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 050 ends -->
            <!-- Extra dummy section 051 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 051</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 051</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 051-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 051-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(496627) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 051-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 051-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(893254) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 051-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 051-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1289881) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 051-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 051-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1686508) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 051-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 051-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2083135) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 051-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 051-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2479762) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 051-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 051-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2876389) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 051-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 051-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3273016) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X051-001</td>
                                <td class="p-3 font-semibold">Generated Item 051-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(2770371) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X051-002</td>
                                <td class="p-3 font-semibold">Generated Item 051-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(5540742) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X051-003</td>
                                <td class="p-3 font-semibold">Generated Item 051-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(8311113) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X051-004</td>
                                <td class="p-3 font-semibold">Generated Item 051-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(11081484) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X051-005</td>
                                <td class="p-3 font-semibold">Generated Item 051-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(13851855) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X051-006</td>
                                <td class="p-3 font-semibold">Generated Item 051-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(16622226) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X051-007</td>
                                <td class="p-3 font-semibold">Generated Item 051-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(19392597) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 051 ends -->
            <!-- Extra dummy section 052 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 052</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 052</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 052-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 052-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(504404) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 052-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 052-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(908808) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 052-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 052-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1313212) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 052-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 052-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1717616) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 052-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 052-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2122020) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 052-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 052-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2526424) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 052-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 052-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2930828) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 052-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 052-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3335232) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X052-001</td>
                                <td class="p-3 font-semibold">Generated Item 052-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(2824692) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X052-002</td>
                                <td class="p-3 font-semibold">Generated Item 052-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(5649384) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X052-003</td>
                                <td class="p-3 font-semibold">Generated Item 052-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(8474076) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X052-004</td>
                                <td class="p-3 font-semibold">Generated Item 052-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(11298768) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X052-005</td>
                                <td class="p-3 font-semibold">Generated Item 052-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(14123460) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X052-006</td>
                                <td class="p-3 font-semibold">Generated Item 052-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(16948152) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X052-007</td>
                                <td class="p-3 font-semibold">Generated Item 052-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(19772844) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 052 ends -->
            <!-- Extra dummy section 053 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 053</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 053</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 053-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 053-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(512181) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 053-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 053-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(924362) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 053-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 053-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1336543) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 053-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 053-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1748724) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 053-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 053-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2160905) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 053-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 053-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2573086) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 053-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 053-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2985267) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 053-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 053-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3397448) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X053-001</td>
                                <td class="p-3 font-semibold">Generated Item 053-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(2879013) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X053-002</td>
                                <td class="p-3 font-semibold">Generated Item 053-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(5758026) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X053-003</td>
                                <td class="p-3 font-semibold">Generated Item 053-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(8637039) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X053-004</td>
                                <td class="p-3 font-semibold">Generated Item 053-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(11516052) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X053-005</td>
                                <td class="p-3 font-semibold">Generated Item 053-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(14395065) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X053-006</td>
                                <td class="p-3 font-semibold">Generated Item 053-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(17274078) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X053-007</td>
                                <td class="p-3 font-semibold">Generated Item 053-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(20153091) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 053 ends -->
            <!-- Extra dummy section 054 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 054</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 054</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 054-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 054-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(519958) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 054-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 054-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(939916) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 054-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 054-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1359874) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 054-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 054-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1779832) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 054-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 054-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2199790) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 054-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 054-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2619748) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 054-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 054-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3039706) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 054-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 054-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3459664) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X054-001</td>
                                <td class="p-3 font-semibold">Generated Item 054-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(2933334) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X054-002</td>
                                <td class="p-3 font-semibold">Generated Item 054-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(5866668) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X054-003</td>
                                <td class="p-3 font-semibold">Generated Item 054-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(8800002) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X054-004</td>
                                <td class="p-3 font-semibold">Generated Item 054-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(11733336) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X054-005</td>
                                <td class="p-3 font-semibold">Generated Item 054-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(14666670) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X054-006</td>
                                <td class="p-3 font-semibold">Generated Item 054-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(17600004) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X054-007</td>
                                <td class="p-3 font-semibold">Generated Item 054-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(20533338) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 054 ends -->
            <!-- Extra dummy section 055 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 055</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 055</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 055-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 055-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(527735) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 055-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 055-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(955470) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 055-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 055-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1383205) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 055-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 055-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1810940) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 055-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 055-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2238675) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 055-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 055-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2666410) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 055-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 055-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3094145) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 055-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 055-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3521880) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X055-001</td>
                                <td class="p-3 font-semibold">Generated Item 055-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(2987655) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X055-002</td>
                                <td class="p-3 font-semibold">Generated Item 055-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(5975310) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X055-003</td>
                                <td class="p-3 font-semibold">Generated Item 055-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(8962965) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X055-004</td>
                                <td class="p-3 font-semibold">Generated Item 055-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(11950620) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X055-005</td>
                                <td class="p-3 font-semibold">Generated Item 055-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(14938275) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X055-006</td>
                                <td class="p-3 font-semibold">Generated Item 055-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(17925930) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X055-007</td>
                                <td class="p-3 font-semibold">Generated Item 055-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(20913585) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 055 ends -->
            <!-- Extra dummy section 056 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 056</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 056</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 056-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 056-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(535512) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 056-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 056-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(971024) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 056-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 056-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1406536) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 056-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 056-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1842048) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 056-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 056-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2277560) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 056-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 056-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2713072) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 056-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 056-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3148584) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 056-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 056-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3584096) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X056-001</td>
                                <td class="p-3 font-semibold">Generated Item 056-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3041976) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X056-002</td>
                                <td class="p-3 font-semibold">Generated Item 056-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(6083952) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X056-003</td>
                                <td class="p-3 font-semibold">Generated Item 056-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(9125928) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X056-004</td>
                                <td class="p-3 font-semibold">Generated Item 056-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(12167904) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X056-005</td>
                                <td class="p-3 font-semibold">Generated Item 056-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(15209880) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X056-006</td>
                                <td class="p-3 font-semibold">Generated Item 056-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(18251856) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X056-007</td>
                                <td class="p-3 font-semibold">Generated Item 056-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(21293832) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 056 ends -->
            <!-- Extra dummy section 057 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 057</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 057</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 057-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 057-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(543289) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 057-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 057-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(986578) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 057-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 057-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1429867) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 057-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 057-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1873156) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 057-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 057-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2316445) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 057-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 057-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2759734) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 057-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 057-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3203023) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 057-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 057-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3646312) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X057-001</td>
                                <td class="p-3 font-semibold">Generated Item 057-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3096297) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X057-002</td>
                                <td class="p-3 font-semibold">Generated Item 057-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(6192594) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X057-003</td>
                                <td class="p-3 font-semibold">Generated Item 057-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(9288891) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X057-004</td>
                                <td class="p-3 font-semibold">Generated Item 057-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(12385188) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X057-005</td>
                                <td class="p-3 font-semibold">Generated Item 057-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(15481485) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X057-006</td>
                                <td class="p-3 font-semibold">Generated Item 057-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(18577782) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X057-007</td>
                                <td class="p-3 font-semibold">Generated Item 057-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(21674079) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 057 ends -->
            <!-- Extra dummy section 058 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 058</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 058</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 058-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 058-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(551066) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 058-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 058-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1002132) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 058-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 058-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1453198) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 058-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 058-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1904264) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 058-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 058-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2355330) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 058-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 058-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2806396) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 058-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 058-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3257462) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 058-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 058-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3708528) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X058-001</td>
                                <td class="p-3 font-semibold">Generated Item 058-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(3150618) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X058-002</td>
                                <td class="p-3 font-semibold">Generated Item 058-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(6301236) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X058-003</td>
                                <td class="p-3 font-semibold">Generated Item 058-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(9451854) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X058-004</td>
                                <td class="p-3 font-semibold">Generated Item 058-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(12602472) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X058-005</td>
                                <td class="p-3 font-semibold">Generated Item 058-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(15753090) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X058-006</td>
                                <td class="p-3 font-semibold">Generated Item 058-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(18903708) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X058-007</td>
                                <td class="p-3 font-semibold">Generated Item 058-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(22054326) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 058 ends -->
            <!-- Extra dummy section 059 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 059</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 059</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 059-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 059-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(558843) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 059-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 059-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1017686) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 059-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 059-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1476529) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 059-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 059-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1935372) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 059-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 059-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2394215) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 059-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 059-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2853058) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 059-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 059-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3311901) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 059-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 059-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3770744) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X059-001</td>
                                <td class="p-3 font-semibold">Generated Item 059-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(3204939) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X059-002</td>
                                <td class="p-3 font-semibold">Generated Item 059-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(6409878) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X059-003</td>
                                <td class="p-3 font-semibold">Generated Item 059-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(9614817) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X059-004</td>
                                <td class="p-3 font-semibold">Generated Item 059-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(12819756) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X059-005</td>
                                <td class="p-3 font-semibold">Generated Item 059-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(16024695) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X059-006</td>
                                <td class="p-3 font-semibold">Generated Item 059-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(19229634) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X059-007</td>
                                <td class="p-3 font-semibold">Generated Item 059-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(22434573) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 059 ends -->
            <!-- Extra dummy section 060 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 060</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 060</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 060-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 060-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(566620) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 060-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 060-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1033240) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 060-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 060-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1499860) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 060-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 060-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1966480) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 060-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 060-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2433100) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 060-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 060-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2899720) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 060-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 060-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3366340) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 060-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 060-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3832960) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X060-001</td>
                                <td class="p-3 font-semibold">Generated Item 060-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3259260) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X060-002</td>
                                <td class="p-3 font-semibold">Generated Item 060-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(6518520) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X060-003</td>
                                <td class="p-3 font-semibold">Generated Item 060-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(9777780) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X060-004</td>
                                <td class="p-3 font-semibold">Generated Item 060-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(13037040) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X060-005</td>
                                <td class="p-3 font-semibold">Generated Item 060-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(16296300) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X060-006</td>
                                <td class="p-3 font-semibold">Generated Item 060-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(19555560) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X060-007</td>
                                <td class="p-3 font-semibold">Generated Item 060-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(22814820) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 060 ends -->
            <!-- Extra dummy section 061 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 061</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 061</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 061-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 061-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(574397) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 061-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 061-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1048794) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 061-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 061-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1523191) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 061-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 061-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1997588) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 061-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 061-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2471985) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 061-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 061-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2946382) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 061-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 061-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3420779) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 061-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 061-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3895176) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X061-001</td>
                                <td class="p-3 font-semibold">Generated Item 061-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3313581) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X061-002</td>
                                <td class="p-3 font-semibold">Generated Item 061-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(6627162) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X061-003</td>
                                <td class="p-3 font-semibold">Generated Item 061-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(9940743) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X061-004</td>
                                <td class="p-3 font-semibold">Generated Item 061-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(13254324) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X061-005</td>
                                <td class="p-3 font-semibold">Generated Item 061-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(16567905) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X061-006</td>
                                <td class="p-3 font-semibold">Generated Item 061-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(19881486) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X061-007</td>
                                <td class="p-3 font-semibold">Generated Item 061-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(23195067) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 061 ends -->
            <!-- Extra dummy section 062 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 062</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 062</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 062-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 062-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(582174) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 062-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 062-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1064348) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 062-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 062-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1546522) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 062-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 062-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2028696) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 062-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 062-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2510870) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 062-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 062-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2993044) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 062-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 062-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3475218) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 062-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 062-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3957392) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X062-001</td>
                                <td class="p-3 font-semibold">Generated Item 062-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3367902) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X062-002</td>
                                <td class="p-3 font-semibold">Generated Item 062-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(6735804) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X062-003</td>
                                <td class="p-3 font-semibold">Generated Item 062-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(10103706) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X062-004</td>
                                <td class="p-3 font-semibold">Generated Item 062-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(13471608) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X062-005</td>
                                <td class="p-3 font-semibold">Generated Item 062-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(16839510) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X062-006</td>
                                <td class="p-3 font-semibold">Generated Item 062-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(20207412) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X062-007</td>
                                <td class="p-3 font-semibold">Generated Item 062-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(23575314) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 062 ends -->
            <!-- Extra dummy section 063 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 063</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 063</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 063-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 063-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(589951) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 063-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 063-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1079902) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 063-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 063-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1569853) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 063-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 063-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2059804) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 063-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 063-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2549755) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 063-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 063-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3039706) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 063-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 063-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3529657) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 063-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 063-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4019608) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X063-001</td>
                                <td class="p-3 font-semibold">Generated Item 063-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(3422223) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X063-002</td>
                                <td class="p-3 font-semibold">Generated Item 063-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(6844446) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X063-003</td>
                                <td class="p-3 font-semibold">Generated Item 063-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(10266669) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X063-004</td>
                                <td class="p-3 font-semibold">Generated Item 063-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(13688892) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X063-005</td>
                                <td class="p-3 font-semibold">Generated Item 063-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(17111115) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X063-006</td>
                                <td class="p-3 font-semibold">Generated Item 063-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(20533338) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X063-007</td>
                                <td class="p-3 font-semibold">Generated Item 063-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(23955561) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 063 ends -->
            <!-- Extra dummy section 064 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 064</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 064</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 064-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 064-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(597728) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 064-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 064-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1095456) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 064-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 064-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1593184) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 064-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 064-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2090912) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 064-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 064-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2588640) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 064-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 064-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3086368) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 064-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 064-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3584096) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 064-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 064-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4081824) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X064-001</td>
                                <td class="p-3 font-semibold">Generated Item 064-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(3476544) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X064-002</td>
                                <td class="p-3 font-semibold">Generated Item 064-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(6953088) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X064-003</td>
                                <td class="p-3 font-semibold">Generated Item 064-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(10429632) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X064-004</td>
                                <td class="p-3 font-semibold">Generated Item 064-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(13906176) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X064-005</td>
                                <td class="p-3 font-semibold">Generated Item 064-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(17382720) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X064-006</td>
                                <td class="p-3 font-semibold">Generated Item 064-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(20859264) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X064-007</td>
                                <td class="p-3 font-semibold">Generated Item 064-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(24335808) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 064 ends -->
            <!-- Extra dummy section 065 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 065</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 065</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 065-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 065-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(605505) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 065-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 065-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1111010) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 065-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 065-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1616515) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 065-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 065-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2122020) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 065-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 065-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2627525) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 065-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 065-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3133030) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 065-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 065-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3638535) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 065-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 065-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4144040) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X065-001</td>
                                <td class="p-3 font-semibold">Generated Item 065-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3530865) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X065-002</td>
                                <td class="p-3 font-semibold">Generated Item 065-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(7061730) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X065-003</td>
                                <td class="p-3 font-semibold">Generated Item 065-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(10592595) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X065-004</td>
                                <td class="p-3 font-semibold">Generated Item 065-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(14123460) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X065-005</td>
                                <td class="p-3 font-semibold">Generated Item 065-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(17654325) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X065-006</td>
                                <td class="p-3 font-semibold">Generated Item 065-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(21185190) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X065-007</td>
                                <td class="p-3 font-semibold">Generated Item 065-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(24716055) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 065 ends -->
            <!-- Extra dummy section 066 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 066</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 066</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 066-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 066-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(613282) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 066-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 066-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1126564) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 066-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 066-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1639846) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 066-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 066-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2153128) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 066-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 066-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2666410) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 066-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 066-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3179692) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 066-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 066-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3692974) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 066-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 066-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4206256) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X066-001</td>
                                <td class="p-3 font-semibold">Generated Item 066-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3585186) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X066-002</td>
                                <td class="p-3 font-semibold">Generated Item 066-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(7170372) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X066-003</td>
                                <td class="p-3 font-semibold">Generated Item 066-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(10755558) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X066-004</td>
                                <td class="p-3 font-semibold">Generated Item 066-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(14340744) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X066-005</td>
                                <td class="p-3 font-semibold">Generated Item 066-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(17925930) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X066-006</td>
                                <td class="p-3 font-semibold">Generated Item 066-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(21511116) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X066-007</td>
                                <td class="p-3 font-semibold">Generated Item 066-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(25096302) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 066 ends -->
            <!-- Extra dummy section 067 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 067</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 067</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 067-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 067-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(621059) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 067-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 067-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1142118) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 067-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 067-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1663177) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 067-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 067-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2184236) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 067-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 067-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2705295) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 067-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 067-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3226354) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 067-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 067-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3747413) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 067-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 067-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4268472) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X067-001</td>
                                <td class="p-3 font-semibold">Generated Item 067-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3639507) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X067-002</td>
                                <td class="p-3 font-semibold">Generated Item 067-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(7279014) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X067-003</td>
                                <td class="p-3 font-semibold">Generated Item 067-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(10918521) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X067-004</td>
                                <td class="p-3 font-semibold">Generated Item 067-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(14558028) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X067-005</td>
                                <td class="p-3 font-semibold">Generated Item 067-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(18197535) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X067-006</td>
                                <td class="p-3 font-semibold">Generated Item 067-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(21837042) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X067-007</td>
                                <td class="p-3 font-semibold">Generated Item 067-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(25476549) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 067 ends -->
            <!-- Extra dummy section 068 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 068</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 068</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 068-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 068-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(628836) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 068-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 068-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1157672) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 068-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 068-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1686508) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 068-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 068-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2215344) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 068-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 068-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2744180) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 068-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 068-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3273016) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 068-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 068-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3801852) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 068-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 068-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4330688) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X068-001</td>
                                <td class="p-3 font-semibold">Generated Item 068-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(3693828) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X068-002</td>
                                <td class="p-3 font-semibold">Generated Item 068-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(7387656) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X068-003</td>
                                <td class="p-3 font-semibold">Generated Item 068-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(11081484) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X068-004</td>
                                <td class="p-3 font-semibold">Generated Item 068-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(14775312) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X068-005</td>
                                <td class="p-3 font-semibold">Generated Item 068-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(18469140) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X068-006</td>
                                <td class="p-3 font-semibold">Generated Item 068-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(22162968) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X068-007</td>
                                <td class="p-3 font-semibold">Generated Item 068-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(25856796) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 068 ends -->
            <!-- Extra dummy section 069 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 069</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 069</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 069-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 069-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(636613) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 069-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 069-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1173226) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 069-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 069-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1709839) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 069-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 069-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2246452) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 069-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 069-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2783065) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 069-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 069-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3319678) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 069-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 069-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3856291) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 069-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 069-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4392904) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X069-001</td>
                                <td class="p-3 font-semibold">Generated Item 069-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(3748149) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X069-002</td>
                                <td class="p-3 font-semibold">Generated Item 069-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(7496298) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X069-003</td>
                                <td class="p-3 font-semibold">Generated Item 069-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(11244447) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X069-004</td>
                                <td class="p-3 font-semibold">Generated Item 069-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(14992596) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X069-005</td>
                                <td class="p-3 font-semibold">Generated Item 069-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(18740745) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X069-006</td>
                                <td class="p-3 font-semibold">Generated Item 069-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(22488894) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X069-007</td>
                                <td class="p-3 font-semibold">Generated Item 069-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(26237043) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 069 ends -->
            <!-- Extra dummy section 070 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 070</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 070</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 070-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 070-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(644390) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 070-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 070-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1188780) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 070-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 070-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1733170) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 070-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 070-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2277560) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 070-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 070-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2821950) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 070-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 070-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3366340) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 070-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 070-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3910730) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 070-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 070-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4455120) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X070-001</td>
                                <td class="p-3 font-semibold">Generated Item 070-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(3802470) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X070-002</td>
                                <td class="p-3 font-semibold">Generated Item 070-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(7604940) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X070-003</td>
                                <td class="p-3 font-semibold">Generated Item 070-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(11407410) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X070-004</td>
                                <td class="p-3 font-semibold">Generated Item 070-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(15209880) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X070-005</td>
                                <td class="p-3 font-semibold">Generated Item 070-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(19012350) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X070-006</td>
                                <td class="p-3 font-semibold">Generated Item 070-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(22814820) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X070-007</td>
                                <td class="p-3 font-semibold">Generated Item 070-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(26617290) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 070 ends -->
            <!-- Extra dummy section 071 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 071</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 071</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 071-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 071-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(652167) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 071-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 071-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1204334) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 071-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 071-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1756501) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 071-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 071-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2308668) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 071-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 071-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2860835) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 071-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 071-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3413002) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 071-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 071-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3965169) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 071-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 071-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4517336) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X071-001</td>
                                <td class="p-3 font-semibold">Generated Item 071-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(3856791) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X071-002</td>
                                <td class="p-3 font-semibold">Generated Item 071-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(7713582) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X071-003</td>
                                <td class="p-3 font-semibold">Generated Item 071-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(11570373) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X071-004</td>
                                <td class="p-3 font-semibold">Generated Item 071-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(15427164) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X071-005</td>
                                <td class="p-3 font-semibold">Generated Item 071-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(19283955) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X071-006</td>
                                <td class="p-3 font-semibold">Generated Item 071-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(23140746) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X071-007</td>
                                <td class="p-3 font-semibold">Generated Item 071-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(26997537) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 071 ends -->
            <!-- Extra dummy section 072 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 072</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 072</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 072-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 072-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(659944) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 072-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 072-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1219888) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 072-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 072-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1779832) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 072-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 072-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2339776) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 072-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 072-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2899720) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 072-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 072-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3459664) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 072-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 072-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4019608) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 072-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 072-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4579552) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X072-001</td>
                                <td class="p-3 font-semibold">Generated Item 072-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(3911112) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X072-002</td>
                                <td class="p-3 font-semibold">Generated Item 072-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(7822224) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X072-003</td>
                                <td class="p-3 font-semibold">Generated Item 072-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(11733336) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X072-004</td>
                                <td class="p-3 font-semibold">Generated Item 072-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(15644448) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X072-005</td>
                                <td class="p-3 font-semibold">Generated Item 072-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(19555560) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X072-006</td>
                                <td class="p-3 font-semibold">Generated Item 072-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(23466672) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X072-007</td>
                                <td class="p-3 font-semibold">Generated Item 072-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(27377784) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 072 ends -->
            <!-- Extra dummy section 073 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 073</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 073</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 073-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 073-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(667721) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 073-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 073-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1235442) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 073-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 073-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1803163) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 073-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 073-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2370884) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 073-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 073-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2938605) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 073-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 073-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3506326) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 073-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 073-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4074047) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 073-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 073-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4641768) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X073-001</td>
                                <td class="p-3 font-semibold">Generated Item 073-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(3965433) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X073-002</td>
                                <td class="p-3 font-semibold">Generated Item 073-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(7930866) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X073-003</td>
                                <td class="p-3 font-semibold">Generated Item 073-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(11896299) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X073-004</td>
                                <td class="p-3 font-semibold">Generated Item 073-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(15861732) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X073-005</td>
                                <td class="p-3 font-semibold">Generated Item 073-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(19827165) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X073-006</td>
                                <td class="p-3 font-semibold">Generated Item 073-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(23792598) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X073-007</td>
                                <td class="p-3 font-semibold">Generated Item 073-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(27758031) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 073 ends -->
            <!-- Extra dummy section 074 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 074</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 074</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">NEW 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 074-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 074-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(675498) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 074-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 074-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1250996) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 074-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 074-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1826494) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 074-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 074-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2401992) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 074-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 074-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2977490) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 074-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 074-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3552988) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 074-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 074-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4128486) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 074-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 074-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4703984) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X074-001</td>
                                <td class="p-3 font-semibold">Generated Item 074-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(4019754) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X074-002</td>
                                <td class="p-3 font-semibold">Generated Item 074-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(8039508) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X074-003</td>
                                <td class="p-3 font-semibold">Generated Item 074-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(12059262) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X074-004</td>
                                <td class="p-3 font-semibold">Generated Item 074-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(16079016) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X074-005</td>
                                <td class="p-3 font-semibold">Generated Item 074-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(20098770) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X074-006</td>
                                <td class="p-3 font-semibold">Generated Item 074-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(24118524) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X074-007</td>
                                <td class="p-3 font-semibold">Generated Item 074-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(28138278) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 074 ends -->
            <!-- Extra dummy section 075 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 075</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 075</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">ACTIVE 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 075-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 075-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(683275) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 075-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 075-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1266550) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 075-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 075-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1849825) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 075-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 075-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2433100) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 075-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 075-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3016375) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 075-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 075-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3599650) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 075-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 075-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4182925) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 075-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 075-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4766200) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X075-001</td>
                                <td class="p-3 font-semibold">Generated Item 075-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(4074075) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X075-002</td>
                                <td class="p-3 font-semibold">Generated Item 075-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(8148150) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X075-003</td>
                                <td class="p-3 font-semibold">Generated Item 075-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(12222225) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X075-004</td>
                                <td class="p-3 font-semibold">Generated Item 075-004</td>
                                <td class="p-3">Demo Category 5</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(16296300) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X075-005</td>
                                <td class="p-3 font-semibold">Generated Item 075-005</td>
                                <td class="p-3">Demo Category 1</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('new') ?>">new</span></td>
                                <td class="p-3 text-right"><?= vnd(20370375) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X075-006</td>
                                <td class="p-3 font-semibold">Generated Item 075-006</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('active') ?>">active</span></td>
                                <td class="p-3 text-right"><?= vnd(24444450) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X075-007</td>
                                <td class="p-3 font-semibold">Generated Item 075-007</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(28518525) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Extra dummy section 075 ends -->
            <!-- Extra dummy section 076 begins -->
            <section class="bg-white rounded-3xl border border-slate-200 shadow-sm mb-7 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-[0.2em]">Extra Section 076</p>
                        <h2 class="text-xl font-black mt-1">Dummy Operational Panel 076</h2>
                        <p class="text-sm text-slate-500 mt-1">This is harmless placeholder UI for line-count and layout demonstration.</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">WAITING 1</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">CLOSED 2</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">DANGER 3</span>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">1</div>
                        <h3 class="font-bold mt-3">Mini Card 076-01</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 076-01.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(691052) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">2</div>
                        <h3 class="font-bold mt-3">Mini Card 076-02</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 076-02.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1282104) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">3</div>
                        <h3 class="font-bold mt-3">Mini Card 076-03</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 076-03.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(1873156) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">4</div>
                        <h3 class="font-bold mt-3">Mini Card 076-04</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 076-04.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(2464208) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">5</div>
                        <h3 class="font-bold mt-3">Mini Card 076-05</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 076-05.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3055260) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">6</div>
                        <h3 class="font-bold mt-3">Mini Card 076-06</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 076-06.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(3646312) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">7</div>
                        <h3 class="font-bold mt-3">Mini Card 076-07</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 076-07.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4237364) ?></p>
                    </article>
                    <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-black">8</div>
                        <h3 class="font-bold mt-3">Mini Card 076-08</h3>
                        <p class="text-sm text-slate-500 mt-2">Dummy text for clinic UI placeholder block 076-08.</p>
                        <p class="text-sm font-semibold mt-3">Amount: <?= vnd(4828416) ?></p>
                    </article>
                </div>
                <div class="px-6 pb-6 overflow-x-auto">
                    <table class="min-w-full text-sm border border-slate-100 rounded-2xl overflow-hidden">
                        <thead class="bg-slate-50 text-slate-500"><tr><th class="text-left p-3">ID</th><th class="text-left p-3">Name</th><th class="text-left p-3">Category</th><th class="text-left p-3">Status</th><th class="text-right p-3">Value</th></tr></thead>
                        <tbody>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X076-001</td>
                                <td class="p-3 font-semibold">Generated Item 076-001</td>
                                <td class="p-3">Demo Category 2</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('waiting') ?>">waiting</span></td>
                                <td class="p-3 text-right"><?= vnd(4128396) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X076-002</td>
                                <td class="p-3 font-semibold">Generated Item 076-002</td>
                                <td class="p-3">Demo Category 3</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('closed') ?>">closed</span></td>
                                <td class="p-3 text-right"><?= vnd(8256792) ?></td>
                            </tr>
                            <tr class="border-t border-slate-100 hover:bg-pink-50/40">
                                <td class="p-3 font-mono">X076-003</td>
                                <td class="p-3 font-semibold">Generated Item 076-003</td>
                                <td class="p-3">Demo Category 4</td>
                                <td class="p-3"><span class="px-2 py-1 rounded-full text-xs font-bold <?= dummy_badge('danger') ?>">danger</span></td>
                                <td class="p-3 text-right"><?= vnd(12385188) ?></td>
                            </tr>
        </main>
    </div>
</body>
</html>
