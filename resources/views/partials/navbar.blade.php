<style>
     .navbar {
        background-color: #007bff;
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }

        .navbar .title {
        font-size: 20px;
        font-weight: bold;
        }

        .navbar .logout {
        background-color: #ff4d4d;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        }

        .navbar .logout:hover {
        background-color: #cc0000;
        }
</style>

<div class="navbar">
    <div class="title">Dashboard</div>
    <form action="/logout" method="POST" style="margin: 0;">
        @csrf
        <button type="submit" class="logout">Logout</button>
    </form>
</div>
