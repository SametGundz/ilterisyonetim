			<style type="text/css">
       #login-button button{
        width:100px;
        background-color: #008ae6;
        color: white;
        border:1px solid black;
        border-radius: 7px;
       }         
            #login-button button:active{
                background-color: #004d80;
            }
        #login-button input{
            margin:4px 0px 4px 0px;
            font-size: 15px;
            letter-spacing: 3px;
        }
            </style>
            <section>
                        <h2>Bina Bilgilerinizi ve Şifrenizi Giriniz</h2><br>
                        <form action="php/login-connect.php"method="POST">
                            <div id="login-button">
                            <select>
                                <option>Apartmanınızı Seçiniz</option>
                                <option>Değer Apt.</option>
                                <option>Umut Apt.</option>
                                <option>Everest Apt.</option>
                                <option>Uludağ Apt.</option>
                                <option>Koyunlar Apt.</option>
                                <option>Bulutlar Apt.</option>
                            </select>
                            <select><?php
                            for($i=0;$i<=50;$i++){
                                echo "<option>No: ".$i."</option>";
                            }
                                ?>
                            </select>
                             <input type="password"name="iletisim_psw"placeholder="Şifre...">
                                <a href="php/login-connect.php"><button type="submit"name="giris">Giriş
                                </button></a></div>
                        </form>
                        <br><br>
            </section>