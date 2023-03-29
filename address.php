<!DOCTYPE html>
<html>
  <head>
    <title>Address Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/address.css" />
  </head> 
  <body>
   

    <div class="container">
    <div class="box">
      <h1>Address Settings</h1>
        <div id="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.531064671048!2d121.0591468753634!3d14.625768976459488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b796aecb8763%3A0xaa026ea7350f82e7!2sTechnological%20Institute%20of%20the%20Philippines%20-%20Quezon%20City!5e0!3m2!1sen!2sph!4v1679145576621!5m2!1sen!2sph"
            width="700px"
            height="300px"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
        <form>
          <label for="address">Address:</label>
          <input
            type="text"
            id="address"
            name="address"
            placeholder="Enter your address"
          />
          <label for="city">City:</label>
          <input type="text" id="city" name="city" placeholder="Enter your city" />
          <label for="state">State:</label>
          <input
            type="text"
            id="state"
            name="state"
            placeholder="Enter your state"
          />
          <label for="country">Country:</label>
          <input
            type="text"
            id="country"
            name="country"
            placeholder="Enter your country"
          />
          <label for="zip">Zip Code:</label>
          <input
            type="text"
            id="zip"
            name="zip"
            placeholder="Enter your zip code"
          />
          <button type="button" onclick="codeAddress()">Find Address</button>
        </form>
    </div>
    </div>

    <script src="address.js"></script>
  </body>
</html>
