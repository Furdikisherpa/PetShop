<?php
require_once "Database/connection.php";

// Get the search query from the URL
$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

// Fetch all products from the database, sorted by name
$query = "SELECT * FROM food ORDER BY name ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Function to perform binary search on the sorted products array
function binarySearch($products, $searchQuery) {
    $left = 0;
    $right = count($products) - 1;
    $results = [];

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);
        $productName = strtolower($products[$mid]['name']); // Ensure case-insensitivity

        // Compare the mid element with the search query
        if (strpos($productName, strtolower($searchQuery)) !== false) {
            // If a match is found, search for nearby matches (since binary search only finds one match)
            $results[] = $products[$mid];

            // Search for more results on the left side
            $i = $mid - 1;
            while ($i >= 0 && strpos(strtolower($products[$i]['name']), strtolower($searchQuery)) !== false) {
                $results[] = $products[$i];
                $i--;
            }

            // Search for more results on the right side
            $i = $mid + 1;
            while ($i < count($products) && strpos(strtolower($products[$i]['name']), strtolower($searchQuery)) !== false) {
                $results[] = $products[$i];
                $i++;
            }
            break;
        }

        // Adjust search range based on comparison
        if ($productName < strtolower($searchQuery)) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return $results;
}

// Perform binary search only if there is a search query
$result = [];
if ($searchQuery) {
    $result = binarySearch($products, $searchQuery);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/shop.css">
</head>
<body>
    <?php require_once "header.php"; ?>
    
    <h2 class="product-heading" style="margin-top:-400px">Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h2>
    <hr>

    <div class="product-container">
        <?php if (count($result) > 0) : ?>
            <?php foreach ($result as $single) : ?>
                <div class="product-item">
                    <div class="product-image">
                        <a href="view_details.php?id=<?php echo $single['id']; ?>">
                        <img src="pimages/<?php echo $single['image']; ?>" alt="<?php echo $single['image']; ?>">
                        </a>
                    </div>
                    <div class="product-name">
                        <a href="view_details.php?id=<?php echo $single['id']; ?>"><?php echo $single['name']; ?></a>
                    </div>
                    <div class="product-details">
                        <div class="product-price">
                            <a href="view_details.php?id=<?php echo $single['id']; ?>"><?php echo $single['price']; ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No results found for "<?php echo htmlspecialchars($searchQuery); ?>"</p>
        <?php endif; ?>
    </div>

    
</body>
</html>
