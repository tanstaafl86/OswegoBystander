                            <dt><?php echo tr("How can I change the MySQL password?"); ?></dt>
                            <dd><?php echo tr("Open the application Terminal and type:"); ?><br/>
                                <br/>
                                <code>/Applications/MAMP/Library/bin/mysqladmin -u root -p password &lt;<?php echo tr("NEWPASSWORD"); ?>&gt;</code><br/>
                                <br/>
                                <?php printf(tr("Replace %sNEWPASSWORD%s with the new password."),'<code style="left: 0pt;">&lt;','&gt;</code>'); ?><br/>
                                <?php echo tr("Afterwards, you also need to change the password for phpMyAdmin and other scripts which are used with MAMP."); ?>
                                <?php echo tr("You can change the password for phpMyAdmin in the file /Applications/MAMP/bin/phpMyAdmin/config.inc.php."); ?>
                            </dd>
                            <dt><?php echo tr("Where can I change the ports for Apache and MySQL?"); ?></dt>
                            <dd><?php echo tr("You can change the ports in the preferences of the MAMP program:"); ?><br/>
                                <br/>
								 <img src="images/<?php print $language; ?>/ports.png" alt="Ports" width="538" height="406" />
                            </dd>
                            <dt><?php echo tr("Where should I save my HTML and PHP pages?"); ?></dt>
                            <dd><?php echo tr("By default, PHP and HTML Pages should be copied to the htdocs folder which is located in /Applications/MAMP."); ?>
                                <?php echo tr("This folder is called &quot;Document Root&quot;."); ?>
                                <?php echo tr("You can change the path for the Document Root folder in the preferences of the MAMP program:"); ?><br/>
                                <br/>
                                <img src="images/<?php print $language; ?>/documentRoot.png" alt="Document Root" width="538" height="406" />
                            </dd>
                            <dt><?php echo tr("Why does MAMP ask me for a password when it is starting or stopping the servers?"); ?></dt>
                            <dd><?php echo tr("You probably have set the Apache port to 1024 or lower."); ?> 
                                <?php echo tr("On a Unix system like Mac OS X you must have root permissions to start IP services with ports smaller than 1024."); ?>
                            </dd>
