# Updating TeamID Enums

```php
$fpl = (new Teams)->getAllTeams();

foreach ($fpl as $team) {
    echo 'CASE '.$team->name." = ".$team->id.';'. PHP_EOL;
}
```
