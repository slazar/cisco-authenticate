cisco-authenticate
==================

Authenticate Cisco Voip phones with a securely stored password hash.

With this, you can do things like push xml to cisco phones.

http://blog.dave.vc/2008/09/remotely-reboot-cisco-79xx-phone.html

http://www.cisco.com/en/US/docs/voice_ip_comm/cuipph/all_models/xsi/5_1/english/programming/guide/ip5_1ch2.html

Also it prevents monkeying around by the casual attacker. Some people suggest to allow all usernames and passwords by having authenticate.php look like this:

     <?
     php echo "AUTHORIZED";
     ?>

I'd rather do this the right way(TM).

Place authenticate.php in your phone server's web directory, like http://voip.example.com/cisco/services/authenticate.php

In your Cisco phone SEPXXXXXXXXXXXX.cnf.xml file, put this to allow authentication:

    <authenticationURL>http://voip.example.com/cisco/services/authentication.php</authenticationURL>

Create some passwords, hashes and salts:

    # php createhashes.php
    
    Store the username and password in a secure place.
    
    Username: |n1p:`WukHKsS777`bly
    Password: jH_de~+REHwX$%z@K:2b
    
    Paste this in the top of authenticate.php
    
    $usernamesalt = '`/|0]3bbB?{\9\TCUCfgI+[V,d[aS3i2Z8p`9v+P7)4-RuZUks';
    $usernamehash = 'c9407cde5b40b3796519667a049f68493b3fabdee639bac470bf95e720b0df896cc1da892dcf679594815df82cf47b9e98d2dc6e7164c5e0021ae1b5baf17617';
    $passwordsalt = '/s$W~2cto{_}uJ%O1UOp+I<.ngnb<F`L_S#QS4Tt3gE@*Mq]D~';
    $passwordhash = '1bba432e8ed2692eb7dd9e7f2af7780697542560d4bc0f9a23a811be68ca13c108f0e5ffdecb0d3be5f2d4a71d63eec98aa79db6cd3bae49483b4304d86c1250';

Don't get any ideas, I'm not using these usernames and passwords and hashes, and neither should you!