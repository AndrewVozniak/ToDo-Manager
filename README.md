# ToDo Manager
<h2>INSTALLATION</h2>
<strong>In cmd:</strong> <br> <br>
cd {root_directory}<br>
composer update<br><br>
replace .env.example to .env and set your settings <br>


<br><hr><br>


<h2>API FEATURES ( TASKS ):</h2>
<strong>Get Tasks By User ID:</strong> </br>
ACCEPT NONE || URL: api/tasks/get/{user_id} || Method: GET

</br></br>
<strong>Get Task By ID:</strong></br>
ACCEPT JSON (user_id (bigint) ) || URL: api/task/get/{task_id} || Method: GET

</br></br>
<strong>Create Task:</strong></br>
ACCEPT JSON (user_id (bigint), name (str), term ( date ), status(str) | default: Waiting ) || URL: api/task/create || Method: POST

</br></br>
<strong>Update Task:</strong></br>
ACCEPT JSON (user_id (bigint), name (str), term ( date ), status(str) ) || URL: api/task/update/{task_id} || Method: PUT

</br></br>
<strong>Delete Task:</strong></br>
ACCEPT NONE || URL: api/task/delete/{task_id} || Method: DELETE <br>


<br><hr><br>


<h2>API FEATURES ( SUBTASKS ):</h2>
<strong>Get Subtasks By Task ID:</strong> </br>
ACCEPT NONE || URL: api/subtasks/get/{task_id} || Method: GET

</br></br>
<strong>Get Subtask by ID:</strong></br>
ACCEPT NONE || URL: api/subtask/get/{subtask_id} || Method: GET

</br></br>
<strong>Create Subtask:</strong></br>
ACCEPT JSON (task_id (bigint), name (str), description (str), term ( date ), status(str) | default: Waiting ) || URL: api/subtask/create || Method: POST

</br></br>
<strong>Update Subtask:</strong></br>
ACCEPT JSON (user_id (bigint), name (str), term ( date ), status(str) ) || URL: api/subtask/update/{task_id} || Method: PUT

</br></br>
<strong>Delete Subtask:</strong></br>
ACCEPT NONE || URL: api/subtask/delete/{task_id} || Method: DELETE
