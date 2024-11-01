setup:
	./vendor/bin/sail up --build -d
	./vendor/bin/sail npm install

artisan-migrate:
	./vendor/bin/sail artisan migrate

artisan-seed:
	./vendor/bin/sail artisan db:seed

run:
	./vendor/bin/sail up -d
	./vendor/bin/sail npm run dev

clearcache:
	./vendor/bin/sail artisan config:cache
	./vendor/bin/sail artisan route:cache

seedproduct:
	./vendor/bin/sail artisan db:seed --class=ProductSeeder