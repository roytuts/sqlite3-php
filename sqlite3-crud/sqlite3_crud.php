<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('projects.db');
      }
   }
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo nl2br("Opened database successfully\n\n");
   }
   
   echo nl2br("Creating Tables --- Start\n\n");
   $sql = file_get_contents('create-table.sql');
   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo nl2br("Tables created successfully\n\n");
   }
   echo nl2br("Creating Tables --- End\n\n");
   
   echo nl2br("Creating Record --- Start\n\n");
   $sql = file_get_contents('insert-data.sql');
   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo nl2br("Records created successfully\n\n");
   }
   echo nl2br("Creating Record --- End\n\n");
   
   echo nl2br("Reading Records --- Start\n\n");
   $sql = 'SELECT * FROM projects p, tasks t WHERE t.project_id = p.project_id';
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		echo nl2br("Project Id: " . $row['project_id'] . "\n");
		echo nl2br("Project Name: " . $row['project_name'] . "\n");
		echo nl2br("Task Id: " . $row['task_id'] . "\n");
		echo nl2br("Task Name: " . $row['task_name'] . "\n");
		echo nl2br("Completed: " . ($row['completed'] != 0 ? 'Yes' : 'No') . "\n");
		echo nl2br("Start Date: " . ($row['start_date'] == NULL ? 'Not started yet' : $row['start_date']) . "\n");
		if($row['completed_date'] != NULL) {
			echo nl2br("Completed Date: " . $row['completed_date'] . "\n");
		}
		echo nl2br("\n");
   }
   echo nl2br("Reading Records --- End\n\n");
   
   echo nl2br("Updating Records --- Start\n\n");
   $sql = "UPDATE projects SET project_name ='Employee Leave Management System' WHERE project_id = 2";
   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo nl2br($db->changes(), "Record updated successfully\n\n");
   }
   echo nl2br("Updating Records --- End\n\n");
   
   echo nl2br("Reading Records --- Start\n\n");
   $sql = 'SELECT * FROM projects p, tasks t WHERE t.project_id = p.project_id';
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		echo nl2br("Project Id: " . $row['project_id'] . "\n");
		echo nl2br("Project Name: " . $row['project_name'] . "\n");
		echo nl2br("Task Id: " . $row['task_id'] . "\n");
		echo nl2br("Task Name: " . $row['task_name'] . "\n");
		echo nl2br("Completed: " . ($row['completed'] != 0 ? 'Yes' : 'No') . "\n");
		echo nl2br("Start Date: " . ($row['start_date'] == NULL ? 'Not started yet' : $row['start_date']) . "\n");
		if($row['completed_date'] != NULL) {
			echo nl2br("Completed Date: " . $row['completed_date'] . "\n");
		}
		echo nl2br("\n");
   }
   echo nl2br("Reading Records --- End\n\n");
   
   echo nl2br("Deleting Records --- Start\n\n");
   $sql = 'DELETE FROM tasks WHERE task_id = 4';
   $ret = $db->exec($sql);
   if(!$ret){
     echo $db->lastErrorMsg();
   } else {
      echo nl2br($db->changes(), " Record deleted successfully\n\n");
   }
   echo nl2br("Deleting Records --- End\n\n");
   
   echo nl2br("Reading Records --- Start\n\n");
   $sql = 'SELECT * FROM projects p, tasks t WHERE t.project_id = p.project_id';
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		echo nl2br("Project Id: " . $row['project_id'] . "\n");
		echo nl2br("Project Name: " . $row['project_name'] . "\n");
		echo nl2br("Task Id: " . $row['task_id'] . "\n");
		echo nl2br("Task Name: " . $row['task_name'] . "\n");
		echo nl2br("Completed: " . ($row['completed'] != 0 ? 'Yes' : 'No') . "\n");
		echo nl2br("Start Date: " . ($row['start_date'] == NULL ? 'Not started yet' : $row['start_date']) . "\n");
		if($row['completed_date'] != NULL) {
			echo nl2br("Completed Date: " . $row['completed_date'] . "\n");
		}
		echo nl2br("\n");
   }
   echo nl2br("Reading Records --- End\n\n");
   
   $db->close();
?>