# GrooveAPI

The API for GrooveLog

### users

#### General CRUD
users/ : GET / POST
users/1 : GET / PUT / DELETE

#### Lists of Supports
users/1/supporters
users/1/supporting
users/1/mentors
users/1/mentoring

#### logs
users/1/logs
users/1/supporters/logs
users/1/supporting/logs
users/1/mentors/logs
users/1/mentoring/logs

#### vision/Goals/Grooves
users/1/visions
users/1/goals
users/1/grooves

NOTE: It is important to establish whether the above are public or private, depending on who is calling

### questionnaires
users/1/questionnaire_results


# CLI Notes:
Create the schema 'groovelog' - e.g. via workbench

php artisan migrate

composer dump-autoload

php artisan db:seed


Serve:
PHP -S localhost:8000 -t public

http://localhost:8000/v1/users