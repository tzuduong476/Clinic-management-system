<?php
/**
 * Fix existing data - Update appointments with customer_id
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/db.php';

echo "=== FIXING EXISTING APPOINTMENTS ===\n\n";

$updated = 0;
$failed = 0;

try {
    // Get all appointments without customer_id
    $stmt = $conn->query("
        SELECT a.id, a.customer_name, a.customer_phone 
        FROM appointments a 
        WHERE a.customer_id IS NULL
    ");
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Found " . count($appointments) . " appointments without customer_id\n\n";
    
    foreach ($appointments as $apt) {
        // Try to find customer by name AND phone
        $stmt = $conn->prepare("
            SELECT Customer_ID FROM Customer 
            WHERE Name = ? AND Phone = ?
            LIMIT 1
        ");
        $stmt->execute([$apt['customer_name'], $apt['customer_phone']]);
        $customer = $stmt->fetch();
        
        if ($customer) {
            // Update appointment with customer_id
            $stmt = $conn->prepare("UPDATE appointments SET customer_id = ? WHERE id = ?");
            $stmt->execute([$customer['Customer_ID'], $apt['id']]);
            $updated++;
            echo "✅ Updated appointment #{$apt['id']} -> customer_id = {$customer['Customer_ID']}\n";
        } else {
            // Try by name only (less reliable)
            $stmt = $conn->prepare("
                SELECT Customer_ID FROM Customer 
                WHERE Name = ?
                LIMIT 1
            ");
            $stmt->execute([$apt['customer_name']]);
            $customer = $stmt->fetch();
            
            if ($customer) {
                $stmt = $conn->prepare("UPDATE appointments SET customer_id = ? WHERE id = ?");
                $stmt->execute([$customer['Customer_ID'], $apt['id']]);
                $updated++;
                echo "✅ Updated appointment #{$apt['id']} -> customer_id = {$customer['Customer_ID']} (by name only)\n";
            } else {
                $failed++;
                echo "❌ Cannot find customer for appointment #{$apt['id']} ({$apt['customer_name']}, {$apt['customer_phone']})\n";
            }
        }
    }
    
    echo "\n" . str_repeat("=", 50) . "\n";
    echo "SUMMARY:\n";
    echo "Updated: $updated\n";
    echo "Failed: $failed\n";
    
    // Verify
    echo "\n--- Verification ---\n";
    $stmt = $conn->query("SELECT COUNT(*) as total, SUM(CASE WHEN customer_id IS NOT NULL THEN 1 ELSE 0 END) as with_cid FROM appointments");
    $stats = $stmt->fetch();
    echo "Total appointments: {$stats['total']}\n";
    echo "With customer_id: {$stats['with_cid']}\n";
    echo "Without customer_id: " . ($stats['total'] - $stats['with_cid']) . "\n";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
