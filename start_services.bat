@echo off
echo Starting Microservices...

REM Start Authors Service
start "Authors Service" cmd /k "cd LumenAuthorsApi && php -S localhost:8001 -t public"

REM Start Books Service
start "Books Service" cmd /k "cd LumenBooksApi && php -S localhost:8002 -t public"

REM Start Gateway Service
start "Gateway Service" cmd /k "cd LumenGatewayApi && php -S localhost:8000 -t public"

REM Start Payments Service (if ready)
start "Payments Service" cmd /k "cd LumenPaymentsApi && php -S localhost:8010 -t public"

echo Services started. Press any key to exit...
pause > nul
