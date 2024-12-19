<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Converter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <h1 class="text-primary">CONVERT YOUR GRADE</h1>
        <p class="text-secondary">Enter your percentage grade below to see your grade point and description.</p><br><br>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form method="POST" action="" class="card p-4 shadow">
                    <div class="mb-3">
                        <label for="percentage" class="form-label">Enter your percentage grade:</label>
                        <input type="number" id="percentage" name="percentage" min="0" max="100" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Convert</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <?php
                $gradeSystem = [
                    ['gradePoint' => 1.00, 'minPercent' => 96, 'maxPercent' => 100, 'description' => 'Excellent'],
                    ['gradePoint' => 1.25, 'minPercent' => 94, 'maxPercent' => 95, 'description' => 'Very Good'],
                    ['gradePoint' => 1.50, 'minPercent' => 91, 'maxPercent' => 93, 'description' => 'Very Good'],
                    ['gradePoint' => 1.75, 'minPercent' => 88, 'maxPercent' => 90, 'description' => 'Good'],
                    ['gradePoint' => 2.00, 'minPercent' => 85, 'maxPercent' => 87, 'description' => 'Good'],
                    ['gradePoint' => 2.25, 'minPercent' => 83, 'maxPercent' => 84, 'description' => 'Good'],
                    ['gradePoint' => 2.50, 'minPercent' => 80, 'maxPercent' => 82, 'description' => 'Fair'],
                    ['gradePoint' => 2.75, 'minPercent' => 78, 'maxPercent' => 79, 'description' => 'Fair'],
                    ['gradePoint' => 3.00, 'minPercent' => 75, 'maxPercent' => 77, 'description' => 'Pass'],
                    ['gradePoint' => 5.00, 'minPercent' => 51, 'maxPercent' => 74, 'description' => 'Failure'],
                    ['gradePoint' => 'DRP', 'minPercent' => 40, 'maxPercent' => 50, 'description' => 'Shift na :)'],
                    ['gradePoint' => 'DRP', 'minPercent' => 20, 'maxPercent' => 39, 'description' => 'SHIFT NA LAGE'],
                    ['gradePoint' => 'DRP', 'minPercent' => 0, 'maxPercent' => 19, 'description' => 'NAHALA UNDANG DKAN']
                ];

                function convertGrade($percentage, $gradeSystem) {
                    foreach ($gradeSystem as $grade) {
                        if ($percentage >= $grade['minPercent'] && $percentage <= $grade['maxPercent']) {
                            return [
                                'gradePoint' => $grade['gradePoint'],
                                'description' => $grade['description']
                            ];
                        }
                    }
                    return [
                        'gradePoint' => 'N/A',
                        'description' => 'Invalid Percentage'
                    ];
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $percentage = $_POST['percentage'];
                    $result = convertGrade($percentage, $gradeSystem);

                    echo "<div class='card p-4 shadow mt-3'>";
                    echo "<h2 class='text-success'>Result</h2>";
                    echo "<p><strong>Percentage:</strong> $percentage%</p>";
                    echo "<p><strong>Grade Point:</strong> " . $result['gradePoint'] . "</p>";
                    echo "<p><strong>Description:</strong> " . $result['description'] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
