CREATE TABLE IF NOT EXISTS projects (
    project_id   INTEGER PRIMARY KEY,
    project_name TEXT    NOT NULL
);
 
CREATE TABLE IF NOT EXISTS tasks (
    task_id        INTEGER PRIMARY KEY,
    task_name      TEXT    NOT NULL,
    completed      INTEGER NOT NULL,
    start_date     TEXT,
    completed_date TEXT,
    project_id     INTEGER NOT NULL,
    FOREIGN KEY (
        project_id
    )
    REFERENCES projects (project_id) ON UPDATE CASCADE
                                     ON DELETE CASCADE
);