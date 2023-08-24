<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');

// Start the session
session_start();

// Check if the user is logged in and has a valid session
if (!isset($_SESSION['id'])) {
    echo "You must be logged in to generate the PDF.";
    exit();
}

// Create a new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Reserved Items List');
$pdf->SetSubject('Reserved Items List PDF');
$pdf->SetKeywords('TCPDF, PDF, example');

// Add a page
$pdf->AddPage();

// Set content
ob_start(); // Start output buffering
?>
<div style="text-align: center; margin-bottom: 20px;">
    <img src="assets/imgs/logo/logo.png" alt="Logo" width="150">
</div>
<h3 style="text-align: center;">Your Reserved Items List</h3>
<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: #4CAF50; color: white;">
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>ISBN</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Include your config file
        require_once "php-assets/config.php";

        // Get the user's ID from the session
        $userId = $_SESSION['id'];

        // Query to fetch reserved items
        $cartQuery = "SELECT r.*, l.LocationName
              FROM Reservation AS c
              JOIN Resource AS r ON c.ResourceID = r.ResourceID
              JOIN Location AS l ON r.LocationID = l.LocationID
              WHERE c.UserID = $userId";
        
        // Execute the query
        $cartResult = $link->query($cartQuery);

        while ($cartItem = $cartResult->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $cartItem['Title']; ?></td>
                <td><?php echo $cartItem['Authors']; ?></td>
                <td><?php echo $cartItem['PublicationYear']; ?></td>
                <td><?php echo $cartItem['ISBN']; ?></td>
                <td><?php echo $cartItem['LocationName']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
$content = ob_get_clean(); // Get the content from the buffer

$pdf->writeHTML($content, true, false, true, false, '');

// Output the PDF to the browser
$pdf->Output('reserved_items.pdf', 'I');
?>
