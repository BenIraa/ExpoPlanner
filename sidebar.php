<!-- sidebar.php -->

<div class="sidebar">
    <ul class="sidebar-links">
        <li><a href="exhibitor_profile.php">Exhibitor Profile</a></li>
        <li><a href="exhibitor_products.php">Products / Services</a></li>
        <li><a href="">Events Agenda And Schedule</a></li>
        <li><a href="">Floor Plan & Booth Assigned</a></li>
        <li><a href="">Add Attendee</a></li>
        <li class="logout-link">
            <form method="post" action="logout.php">
                <input type="submit" name="logout" value="Logout">
            </form>
        </li>

            

        <!-- Add more sidebar links as needed -->
    </ul>
</div>

<style>
    .sidebar {
        width: 20%;
        background-color: #2c3e50; /* Dark blue background */
        padding: 20px;
        height: 100vh; /* Set height to 100% of viewport height */
        color: #ecf0f1; /* Light gray text color */
    }

    .sidebar-links {
        list-style: none;
        padding: 0;
        margin-top: 20px; /* Adjust top margin as needed */
    }

    .sidebar-links li {
        margin-bottom: 10px;
    }

    .sidebar-links a {
        text-decoration: none;
        color: #ecf0f1; /* Light gray text color */
        font-weight: bold;
        cursor: pointer;
        display: block;
        padding: 8px;
        border-radius: 4px;
        transition: background-color 0.3s; /* Smooth background color transition */
    }

    .sidebar-links a:hover {
        background-color: #34495e; /* Darker blue on hover */
    }
    .logout-link input {
        background-color: #e74c3c; /* Red background for logout button */
        color: #ecf0f1; /* Light gray text color for logout button */
        border: none;
        padding: 8px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s; /* Smooth background color transition */
    }
    .logout-link input:hover {
        background-color: #c0392b; /* Darker red on hover */
    }
</style>
