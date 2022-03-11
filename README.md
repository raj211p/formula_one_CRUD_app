# formula_one_CRUD_app
Allows a user to simulate the management of multiple Formula One teams and manage team info using a CRUD application built on the LAMP stack. Note that multiple deviations from actual Formula One rules have been made; for example, certain pit crew members may not work on a car owned by one team in this application. It is meant to be more of a programming exercise than a perfect depiction of how a real F1 team database would look like.

Main database tables:
teams, races, drivers, cars, & pit crew.

Secondary tables:
Participates_in: keeps track of team performance across races.
Pit_crew_cars_worked_on: keeps track of which pit crew members work on each car.

The SQL script (DB_create.sql) is used to create the database before the application is used to access it.

Acknowledgement to: github.com/pankajibn for the base code for the CRUD operations.
