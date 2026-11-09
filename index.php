<?php
require "./order_functions.php";
date_default_timezone_set('America/New_York');

$lastVisit = $_COOKIE['lastVisit'] ?? null;
$welcomeBack = '';
if ($lastVisit !== null && ctype_digit($lastVisit)) {
   $welcomeBack = 'Welcome back — your last visit was ' . date('l, F j, Y g:i a', (int) $lastVisit) . '.';
}
?>

<?php if ($welcomeBack !== ''): ?>
   <p class="welcome-note"><?= htmlspecialchars($welcomeBack) ?></p>
<?php endif; ?>

<option value="Cheesecake" <?= dessertSelected("Cheesecake"); ?>>Cheesecake</option>
<option value="Coffee" <?= drinkSelected("Coffee"); ?>>Coffee</option>
<input type="radio" name="drinkSize" value="Small" <?= drinkSizeSelected("Small"); ?>>

<div class="insight-card">
   <h3>Live guidance</h3>
   <p><?= htmlspecialchars(completionMessage()); ?></p>
   <p class="insight-note"><?= htmlspecialchars(pairingSuggestion()); ?></p>
</div>

<div class="insight-card pricing-grid">
   <div>
      <h3>Estimated total</h3>
      <p class="price-figure"><?= htmlspecialchars(formattedTotal()); ?></p>
   </div>
   <div>
      <h3>Order profile</h3>
      <p><?= htmlspecialchars(orderProfile()); ?></p>
   </div>
</div>