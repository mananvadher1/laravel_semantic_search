<?php

// app/helpers.php

if (!function_exists('cosineSimilarity')) {
    function cosineSimilarity(array $vec1, array $vec2): float
    {
        if (!$vec1 || !$vec2 || count($vec1) !== count($vec2)) {
            return 0.0;
        }

        $dotProduct = array_sum(array_map(fn($a, $b) => $a * $b, $vec1, $vec2));
        $magnitudeA = sqrt(array_sum(array_map(fn($a) => $a * $a, $vec1)));
        $magnitudeB = sqrt(array_sum(array_map(fn($b) => $b * $b, $vec2)));

        if ($magnitudeA == 0 || $magnitudeB == 0) {
            return 0.0;
        }

        return $dotProduct / ($magnitudeA * $magnitudeB);
    }
}

