<!DOCTYPE html>
<html>
<head>
    <title>Project Upload</title>
</head>
<body>
    <h1>Upload a Project</h1>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="name">Project Name:</label>
        <input type="text" name="name" required><br>
        
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        
        <label for="image">Image:</label>
        <input type="file" name="image" accept="Uploads/*" required><br>
        
        <label for="project_file">Project File:</label>
        <input type="file" name="project_file" required><br>
        
        <input type="submit" value="Upload">
    </form>
</body>
</html>
