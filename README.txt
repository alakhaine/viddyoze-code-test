Solution:
- index.php file generates the view and displays product catalog and current state of the basket. Below the basket there is is a breakdown of the cost: material cost, delivery, applied discount from the offer and the total
- utils.php contains cost calculations and file saving/reading methods
- definitions.php contains the arrays with product catalog, delivery cost rules and offers
- front.php contains functions generating elements of the display: product catalog and basket view
- basket_API.php contains the API, which allows operations on the basket. It works in the current setup but is designed to work with JQuery calls as well
- config.php contains required global variable,s in this case only one - path to the folder with basket files
- crud_basket.php - basic operations on the basket. separated from API for ease of switching storage methods

Assummptions:
- no user login or registration
- no security beyond design best practices
- there is currently only one user, although the API and storage is built in a way user identification can be easily added and it will scale up.
- multiple offers can potentially be applied at once, but they should not be cross-product i.e. buy 3 reds to get 1 red 30% off is OK, buy 3 reds to get 1 green 30% off is not. Only the largest discount would be applied (promotions cannot be joined).
