### Instalation
1. Clone the repo
   ```
   git clone https://github.com/HengkyLaurencio/BeliDec.git
   ```
2. Install Composer and NPM Pakage
   ```
   composer install
   npm install
   ```
3. Copy .env.example file to .env, configure the env file to your environment
   ```
   cp .env.example .env
   php artisan key:generate
   ```
4. Execute the migrate Artisan command
   ```
   php artisan migrate:fresh
   ```
5. Generate dummy data
   ```
   php artisan db:seed
   ```
6. Run project
   ```
   php artisan serve
   npm run dev
   ```
