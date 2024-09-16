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