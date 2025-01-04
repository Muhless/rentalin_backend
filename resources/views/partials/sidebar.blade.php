<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('css/logo.png') }}" alt="Logo" class="sidebar-logo">
    </div>
    <ul>
        <li><a href="/home">Dashboard</a></li>
        <li><a href="/rent">Rental</a></li>
        <li><a href="/car">Mobil</a></li>
        <li><a href="/account">Account</a></li>
        <li>
            <form action="/logout" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </li>
    </ul>
</div>

<style>
    /* Sidebar Container */
    .sidebar {
        width: 250px;
        background-color: #007bff;
        color: white;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        padding: 20px;
        box-sizing: border-box;
        transition: width 0.3s ease;
    }

    .sidebar:hover {
        width: 280px;
        /* Expanding sidebar on hover */
    }

    /* Sidebar Header */
    .sidebar-header {
        text-align: center;
        margin-bottom: 20px;
        height: 300;
    }

    .sidebar-logo {
        width: 100px;
        /* Ukuran logo */
        height: auto;
        /* Menjaga proporsi gambar */
        margin-bottom: 20px;
    }

    /* List Styles */
    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        margin: 15px 0;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: white;
        font-size: 16px;
        display: block;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* Hover Effect for Links */
    .sidebar ul li a:hover {
        background-color: #0056b3;
        /* Darker blue for hover */
        text-decoration: underline;
    }

    /* Logout Button */
    .logout-btn {
        background: none;
        border: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
        padding: 10px;
        width: 100%;
        text-align: left;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* Hover Effect for Logout */
    .logout-btn:hover {
        background-color: #cc0000;
        text-decoration: underline;
    }
</style>
