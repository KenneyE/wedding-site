    <!-- Intro -->
      <section id="intro" class="main style1 dark fullscreen">
        <div class="content container 75%">
          <header>
            <?php
            // Change this to YOUR address
            $recipient = 'you@gmail.com';
            $name = $_POST['name'];
            $attending= $_POST['attending'];
            $attending_friday= $_POST['attending-friday'];
            $food = $_POST['food'];
            $notes = $_POST['notes'];
            $email = "you@gmail.com";

            $subject = "RSVP from JimLovesJen.com!";
            $body = "Names: " . $name . "\r\n\r\n" .
              "Attending: " . $attending . "\r\n\r\n" .
                "Food Options: " . $food . "\r\n\r\n" .
                  "Attending Friday: " . $attending_friday . "\r\n\r\n" .
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
            if ($attending == 'Yes' && preg_match('/^\s*$/', $food)) {
              $messages[] = "You didn't tell us what you're eating!";
            }
            if (count($messages)) {
              $subject = "INCOMPLETE RSVP from JimLovesJen.com";
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
              echo("<h2>Thanks for the RSVP!</h2><h3>Need to RSVP for another person? Scroll down and do it again!</h3>");
            }
            ?>
          </header>
          <p>We're getting married!</p>
          <footer>
            <a href="#one" class="button style2 down">More</a>
          </footer>
        </div>
      </section>