<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        Settings
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>


<style>
    .admin-tab ul {
        background: #fff;
        box-shadow: 0 0 10x 0 rgba(0, 0, 0, .15);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .admin-tab ul li {
        float: left;
        margin: 0 10px;
    }

    .admin-tab ul li a {
        line-height: 40px;
        padding: 0 10px;
        color: #222;
        display: block;
        font-weight: bold;
    }

    .admin-tab ul li.active a {
        box-shadow: 0 2px 0 0 #00a0d2 inset;
    }

    .box-content {
        background: #fff;
    }

    .box- form {
        padding-left: 20px;
        padding-bottom: 5px;
    }

    .soical-media li label,
    .soical-media li div {
        margin-bottom: .5rem;
    }
</style>

<div class="box- box-content" tab>

    <div class="admin-tab">
        <ul tab-list>
            <li>
                <a href="#">General</a>
            </li>
            <li>
                <a href="#">Search</a>
            </li>
            <li>
                <a href="#">Home Page</a>
            </li>
            <li>
                <a href="#">Footer</a>
            </li>
            <li>
                <a href="#">Soical Media</a>
            </li>
            <li>
                <a href="#">Comments</a>
            </li>
            <li>
                <a href="#">Maintenance Mode</a>
            </li>
            <li>
                <a href="#">SMTP Mail</a>
            </li>
        </ul>
    </div>

    <form action="" method="post" class="form label">
        <div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Site Title</label>
                        <div class="form-content">
                            <input type="text" name="settings[title]" value="<?= setting('title') ?>" placeholder="Site Title">
                        </div>
                    </li>
                    <li>
                        <label>Site Description</label>
                        <div class="form-content">
                            <input type="text" name="settings[description]" value="<?= setting('description') ?>" placeholder="Site Description">
                        </div>
                    </li>
                    <li>
                        <label>Site Keywords</label>
                        <div class="form-content">
                            <input type="text" name="settings[keywords]" value="<?= setting('keywords') ?>" placeholder="Site Keywords">
                        </div>
                    </li>
                    <li>
                        <label>Site Theme</label>
                        <div class="form-content">
                            <select name="settings[theme]" id="theme">
                                <option value=" ">- Chose a theme -</option>
                                <?php foreach ($themes as $theme) : ?>
                                    <option <?= setting('theme') == $theme ? 'selected' : null ?> value="<?= $theme ?>"><?= $theme ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Search input placeholder</label>
                        <div class="form-content">
                            <input type="text" name="settings[search_placeholder]" value="<?= setting('search_placeholder') ?>" placeholder="Search input placeholder">
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Welcome Title</label>
                        <div class="form-content">
                            <input type="text" name="settings[welcome_title]" value="<?= setting('welcome_title') ?>" placeholder="Welcome Title">
                        </div>
                    </li>
                    <li>
                        <label>Welcome Text</label>
                        <div class="form-content">
                            <input type="text" name="settings[welcome_text]" value="<?= setting('welcome_text') ?>" placeholder="Welcome Text">
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Footer About Text</label>
                        <div class="form-content">
                            <input type="text" name="settings[footer_about]" value="<?= setting('footer_about') ?>" placeholder="Footer About Text">
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul class="soical-media">
                    <li>
                        <label>Facebook URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_facebook]" value="<?= setting('soical_facebook') ?>" placeholder="Facebook URl:">
                        </div>
                        <label>Facebook Name</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_facebook_name]" value="<?= setting('soical_facebook_name') ?>" placeholder="Facebook Name">
                        </div>
                    </li>
                    <li>
                        <label>Twitter URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_twitter]" value="<?= setting('soical_twitter') ?>" placeholder="Twitter URL">
                        </div>
                        <label>Twitter Name</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_twitter_name]" value="<?= setting('soical_twitter_name') ?>" placeholder="Twitter Name">
                        </div>
                    </li>
                    <li>
                        <label>Instagram URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_instagram]" value="<?= setting('soical_instagram') ?>" placeholder="Instagram URL">
                        </div>
                        <label>Instagram Name</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_instagram_name]" value="<?= setting('soical_instagram_name') ?>" placeholder="Instagram Name">
                        </div>
                    </li>
                    <li>
                        <label>Github URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_github]" value="<?= setting('soical_github') ?>" placeholder="Github URL">
                        </div>
                        <label>Gıthub Name</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_github_name]" value="<?= setting('soical_github_name') ?>" placeholder="Github Name">
                        </div>
                    </li>
                    <li>
                        <label>Linkedin URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_linkedin]" value="<?= setting('soical_linkedin') ?>" placeholder="Linkedin URL">
                        </div>
                        <label>Linkedin Name</label>
                        <div class="form-content">
                            <input type="text" name="settings[soical_linkedin_name]" value="<?= setting('soical_linkedin_name') ?>" placeholder="Linkedin Name">
                        </div>
                    </li>

                </ul>
            </div>
            <div tab-content>
                <h1>Comment</h1> <br>
                <ul>
                    <li>
                        <label>Visitor Comment:</label>
                        <div class="form-content">
                            <select name="settings[visitor_comment]" id="visitor_comment">
                                <option <?= setting('visitor_comment') == 1 ? 'selected' : null ?> value="1"> Unapproved </option>
                                <option <?= setting('visitor_comment') == 2 ? 'selected' : null ?> value="2"> Approved </option>
                            </select>
                        </div>
                        <br>
                        <label>User Comment:</label>
                        <div class="form-content">
                            <select name="settings[user_comment]" id="user_comment">
                                <option <?= setting('user_comment') == 1 ? 'selected' : null ?> value="1"> Unapproved </option>
                                <option <?= setting('user_comment') == 2 ? 'selected' : null ?> value="2"> Approved </option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <h1>Maintenance Mode</h1> <br>
                <ul>
                    <li>
                        <label>Mainteance Mode Situation:</label>
                        <div class="form-content">
                            <select name="settings[mainteance]" id="mainteance">
                                <option <?= setting('mainteance') == 1 ? 'selected' : null ?> value="1"> NO </option>
                                <option <?= setting('mainteance') == 2 ? 'selected' : null ?> value="2"> YES </option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Mainteance Mode Title</label>
                        <div class="form-content">
                            <input type="text" name="settings[mainteance_title]" placeholder="Mainteance Mode Title">
                        </div>
                    </li>
                    <li>
                        <label>Mainteance Mode Description</label>
                        <div class="form-content">
                            <textarea name="settings[mainteance_description]" cols="30" rows="5" placeholder="Mainteance Mode Description"></textarea>
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul>
                    <li>
                        <label>SMTP Host</label>
                        <div class="form-content">
                            <input type="text" name="settings[smtp_host]" value="<?= setting('smtp_host') ?>" placeholder="SMTP Host">
                        </div>
                    </li>
                    <li>
                        <label>SMTP E-Mail</label>
                        <div class="form-content">
                            <input type="text" name="settings[smtp_email]" value="<?= setting('smtp_email') ?>" placeholder="SMTP E-Mail">
                        </div>
                    </li>
                    <li>
                        <label>SMTP E-Mail Password</label>
                        <div class="form-content">
                            <input type="password" id="password" name="settings[smtp_password]" value="<?= setting('smtp_password') ?>" placeholder="SMTP E-Mail Password">
                            <input style="margin-left: 1rem;" type="checkbox" onclick="hidePassword()"> Show Password
                        </div>
                    </li>
                    <li>
                        <label>Sender Name</label>
                        <div class="form-content">
                            <input type="text" name="settings[smtp_sender_name]" value="<?= setting('smtp_sender_name') ?>" placeholder="Sender Name">
                        </div>
                    </li>
                    <li>
                        <label>SMTP Secure</label>
                        <div class="form-content">
                            <select name="settings[smtp_secure]" id="smtp_secure">
                                <option <?= setting('smtp_secure') == 'tls' ? 'selected' : null ?> value="tls">TLS</option>
                                <option <?= setting('smtp_secure') == 'ssl' ? 'selected' : null ?> value="ssl">SSL</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>SMTP Port</label>
                        <div class="form-content">
                            <input type="text" name="settings[smtp_port]" value="<?= setting('smtp_port') ?>" placeholder="SMTP Port">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <ul>
            <li class="submit">
                <input type="hidden" name="submit" value="1">
                <button type="submit">Save Settings</button>
            </li>
        </ul>
    </form>
</div>

<script>
    function hidePassword() {
        const input = document.getElementById('password');
        if (input.type === "password") {
            input.type = "text"
        } else {
            input.type = "password"
        }
    }
</script>

<?php require adminView('static/footer') ?>