<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            resize: none;
        }
        
        label {
            font-weight: bold;
        }
        
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background: white;
            cursor: pointer;
        }
        
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        
        button:hover {
            background: #0056b3;
        }
        
    </style>
</head>
<body>
    <form action="admin_issues.php" method="post">
        <textarea rows="10" cols="50" name="issue_Description" id="issue" placeholder="Enter Your Issue"></textarea>
        <select name="issue-list" id="issue-list">
            <label for="issue-list">Issue Regarding:</label>
            <option value="application">Placement Applications</option>
            <option value="Placement Posts">Placement Posts</option>
            <option value="Profile Issue">Profile</option>
            <option value="suggestion" >Any other suggestion</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>