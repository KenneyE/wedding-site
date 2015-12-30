    <!-- Intro -->
      <section id="intro" class="main style1 dark fullscreen">
        <div class="content container 75%">
          <header>
            <!-- <h2>Eric &amp; Sarah</h2> -->
            <?php
            // Change this to YOUR address
            $recipient = 'ekenney5@gmail.com';
            $name = $_POST['name'];
            $attending= $_POST['attending'];
            $food = $_POST['food'];
            $notes = $_POST['notes'];
            $email = "ekenney5@gmail.com";

            $subject = "RSVP from EricLovesSarah.com!";
            $body = "Names: " . $name . "\r\n\r\n" .
              "Attending: " . $attending . "\r\n\r\n" .
                "Food Options: " . $food . "\r\n\r\n" .
                  "Notes: " . $notes;


            # We'll make a list of error messages in an array
            $messages = array();
            # CAREFUL: don't allow hackers to sneak line breaks and additional
            # headers into the message and trick us into spamming for them!
            $subject = preg_replace('/\s+/', ' ', $subject);
            # Make sure the subject isn't blank afterwards!
            if (preg_match('/^\s*$/', $name)) {
              $messages[] = "Please specify a name for your RSVP.";
            }
            # Make sure the message has a body
            if (preg_match('/^\s*$/', $attending)) {
              $messages[] = "You didn't tell us if you're attending!";
            }
            if (preg_match('/^\s*$/', $food)) {
              $messages[] = "You didn't tell us what you're eating!";
            }
            if (count($messages)) {
              $subject = "INCOMPLETE RSVP from EricLovesSarah.com";
              mail($recipient,
              $subject,
              $body,
              "From: Wedding RSVP <$email>\r\n");

              # There were problems, so tell the user and
              # don't send the message yet
              echo("<h2>WAIT!</h2><h2>You missed something!</h2>");
              foreach ($messages as $message) {
                echo("<h3>$message</h3>\n");
              }
              echo("<h3>Please fix these problems and RSVP one more time.</h3>");
            } else {
              # Send the email - we're done
              mail($recipient,
              $subject,
              $body,
              "From: Wedding RSVP <$email>\r\n");
              echo("<h2>Thanks for the RSVP!</h2>");
            }
            ?>
          </header>
          <p>We're getting married!</p>
          <footer>
            <a href="#one" class="button style2 down">More</a>
          </footer>
        </div>
      </section>