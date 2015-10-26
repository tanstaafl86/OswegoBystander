                            <dt><?php echo tr("My PHP scripts need more resources to run. Changing the PHP.ini file did not seem to work, what can I do?"); ?></dt>
                            <dd><?php echo tr("You must always use the template functions of MAMP PRO to edit the configuration files of the MAMP subsystem."); ?>
                                <?php echo tr("If can change them bypassing MAMP PRO your changes will most likely be ignored or overwritten the next time the servers start."); ?><br/>
                                <?php echo tr("Use the submenu of the File->Edit Template->PHP menu to select the PHP.ini file you want to change."); ?>
                                <?php echo tr("All this holds also true for other parts of MAMP. Use the corresponding submenu to modify the Apache, MySQL or Postfix config files."); ?><br/>
                                <?php echo tr("In the template editing window do not modify or delete the placeholders starting with and ending in &quot;MAMP&quot;. This could break some or all functions of MAMP PRO."); ?><br/>
                                <br/>
                                <img src="images/<?php print $language; ?>/template_pro.png" alt="Templates" width="527" height="428" />
                            </dd>
                            <dt><?php echo tr("How can I change the MySQL password?"); ?></dt>
                            <dd><?php echo tr("Switch to the MySQL tab and click &quot;Change password&quot;."); ?><br/>
                                <?php echo tr("Type the new password twice. Click &quot;Change&quot; to save it. This will also automatically save the password to phpMyAdmin."); ?>
                                <?php echo tr("You still need to change the MySQL password in your own scripts though."); ?>
                            </dd>
                            <dt><?php echo tr("Where can I change the ports for Apache and MySQL?"); ?></dt>
                            <dd><?php echo tr("You change the ports in the General tab of the MAMP PRO program:"); ?><br/>
                                <br/>
                                <img src="images/<?php print $language; ?>/ports_pro.png" alt="Ports" width="527" height="428" />
                            </dd>
                            <dt><?php echo tr("I get an error when I try to start Apache and MySQL but the error logs are empty. What can I do to identify the problem?"); ?></dt>
                            <dd><?php echo tr("This seems to be due to incorrect rights settings. Make sure that the rights of the log file you selected are set correctly."); ?>
                                <?php echo tr("You can apply necessary changes in the Finder using the Information dialog or in the application &quot;Terminal&quot; using the commands <code>chown</code> and <code>chmod</code>."); ?>
                            </dd>
                            <dt><?php echo tr("Where should I save my HTML and PHP pages?"); ?></dt>
                            <dd><?php echo tr("By default, PHP and HTML Pages should be copied to the htdocs folder which is located in /Applications/MAMP."); ?>
                                <?php echo tr("This folder is called &quot;Document Root&quot;."); ?>
                                <?php echo tr("You can change the path for the Document Root folder in the hosts section of MAMP PRO:"); ?><br/>
                                <br/>
                                <img src="images/<?php print $language; ?>/documentRoot_pro.png" alt="Document Root" width="527" height="428" />
                            </dd>
                            <dt><?php echo tr("Why does MAMP ask me for a password when it is starting or stopping the servers?"); ?></dt>
                            <dd><?php echo tr("You probably have set the Apache port to 1024 or lower."); ?> 
                                <?php echo tr("On a Unix system like Mac OS X you must have root permissions to start IP services with ports smaller than 1024."); ?>
                            </dd>
                            <dt><?php echo tr("XYZ does not appear in the Extras list. Why is it not available?"); ?></dt>
                            <dd><?php echo tr("Please make sure that your host settings meet the minimum requirements of XYZ (PHP version, disk space, etc.) and that your computer is connected to the Internet."); ?> 
                                <?php echo tr("If XYZ still does not show up in the Extras list it might (still) not be available as an Extra. We are making more and more Extras available over time."); ?>
                                <?php echo tr("You can always make a feature request so we know which Extras we should tackle next."); ?>
                                <br/>
                                <img src="images/<?php print $language; ?>/extras_pro.png" alt="Extras" width="527" height="428" />
                            </dd>
