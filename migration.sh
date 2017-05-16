##Create Table
echo "Enter Database Table Name Here"
read TABLE
echo "$(php artisan make:migration create_${TABLE}_table --create=${TABLE})"

##Create Model
echo "Do you want to create Model of ${TABLE} table? (y/n)"
read AGREEMENT
if [ "$AGREEMENT" = "y" ]; then
  echo "$(php artisan make:model ${TABLE})"
fi

##Create Controller
echo "Do you want to create ${TABLE} Controller also? (y/n)"
read AGREEMENT
if [ "$AGREEMENT" = "y" ]; then
  echo "$(php artisan make:controller ${TABLE})Controller"
fi
