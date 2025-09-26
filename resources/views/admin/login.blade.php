<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPKP & SPAK - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f1e8 0%, #e8dcc0 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background: linear-gradient(145deg, #f0ead6, #e6dcc4);
            border-radius: 25px;
            box-shadow: 
                15px 15px 30px rgba(0, 0, 0, 0.1),
                -15px -15px 30px rgba(255, 255, 255, 0.8),
                inset 3px 3px 6px rgba(0, 0, 0, 0.05),
                inset -3px -3px 6px rgba(255, 255, 255, 0.7);
            padding: 50px 60px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 
                5px 5px 15px rgba(0, 0, 0, 0.2),
                -5px -5px 15px rgba(255, 255, 255, 0.8);
            position: relative;
        }

        .title {
            font-size: 42px;
            font-weight: 300;
            color: #8b6914;
            margin-bottom: 8px;
            letter-spacing: 3px;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
        }

        .subtitle {
            font-size: 16px;
            color: #6b5710;
            margin-bottom: 50px;
            font-weight: 400;
            letter-spacing: 1px;
            opacity: 0.9;
        }

        .form-group {
            margin-bottom: 35px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 12px;
            font-size: 16px;
            color: #6b5710;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .input-field {
            width: 100%;
            padding: 18px 25px;
            font-size: 16px;
            border: none;
            border-radius: 50px;
            background: linear-gradient(145deg, #e8dcc0, #f0ead6);
            box-shadow: 
                inset 8px 8px 16px rgba(0, 0, 0, 0.1),
                inset -8px -8px 16px rgba(255, 255, 255, 0.9);
            color: #5a4a0f;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-field::placeholder {
            color: #a08c5a;
            opacity: 0.8;
        }

        .input-field:focus {
            box-shadow: 
                inset 10px 10px 20px rgba(0, 0, 0, 0.12),
                inset -10px -10px 20px rgba(255, 255, 255, 0.95),
                0 0 0 3px rgba(212, 175, 55, 0.3);
        }

        .login-btn {
            width: 70%;
            padding: 18px 0;
            font-size: 20px;
            font-weight: 500;
            color: #ffffff;
            background: linear-gradient(145deg, #a68b3b, #8b6914);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin-top: 20px;
            letter-spacing: 2px;
            text-transform: uppercase;
            box-shadow: 
                8px 8px 16px rgba(0, 0, 0, 0.2),
                -8px -8px 16px rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 
                10px 10px 20px rgba(0, 0, 0, 0.25),
                -5px -5px 10px rgba(255, 255, 255, 0.1);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:active {
            transform: translateY(0);
            box-shadow: 
                4px 4px 8px rgba(0, 0, 0, 0.2),
                -4px -4px 8px rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 40px 30px;
                margin: 10px;
            }
            
            .title {
                font-size: 32px;
                letter-spacing: 2px;
            }
            
            .subtitle {
                font-size: 14px;
            }
            
            .login-btn {
                width: 80%;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
        <img src="images/logo_bogor.svg" alt="Logo Bogor">
    </div>
        <h1 class="title">SPKP & SPAK</h1>
        <p class="subtitle">Sistem Administrasi Survei Kepuasan & Anti Korupsi</p>
        
        <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="input-field"
                    placeholder="Username"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="input-field"
                    placeholder="Password"
                    required
                >
            </div>
            
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

    <script>
        // Add some interactive functionality
        document.querySelector('.login-btn').addEventListener('click', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            if (username && password) {
                this.innerHTML = 'Logging in...';
                this.style.background = 'linear-gradient(145deg, #7a6b2a, #6b5710)';
                
                setTimeout(() => {
                    window.location.href = "admin.dashboard_admin";
                }, 1500);
            } else {
                alert('Please fill in both username and password!');
            }
        });

        // Add focus effects
        const inputs = document.querySelectorAll('.input-field');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
                this.parentElement.style.transition = 'transform 0.2s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>