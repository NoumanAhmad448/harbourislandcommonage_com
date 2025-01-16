-- User name and email for harbor country

SELECT
    name,
    email
FROM
    `users`
WHERE
    `name` NOT LIKE '%test%'
    AND `email` NOT LIKE '%test%'
    AND `is_super_admin` IS NULL
    AND `is_admin` IS NULL
    AND `email` NOT LIKE '%harbor.com%'
    AND `email` NOT LIKE '%habour.com%'
    AND name <> "uroosa sehar";