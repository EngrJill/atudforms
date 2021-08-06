<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Be a Para-Tinda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="style/paraatud-style.css">
</head>
  
<body>
    <div id='vueapp'>
        <div class="navbar">
            <img src="assets/logo2.png" alt="Atud Logo White" href="">
        </div>

    <!--
    <table border='1' width='100%' style='border-collapse: collapse;'>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Country</th>
        <th>City</th>
        <th>Job</th>

    </tr>

    <tr v-for='contact in contacts'>
        <td>{{ contact.name }}</td>
        <td>{{ contact.email }}</td>
        <td>{{ contact.country }}</td>
        <td>{{ contact.city }}</td>
        <td>{{ contact.job }}</td>
    </tr>
    </table>

    </br>
-->
        <div class="container">
            <div class="container-formcontainer">
                <div class="container-formcontainer-title">
                    <div class="img-container">
                        <img src="assets/logo3.png" alt="Atud Logo">
                    </div>
                    <div class="container-formcontainer-title-bg">
                        <h1> Para-Atud Registration </h1>
                    </div>
                    
                </div>
                <form class="container-formcontainer-form">
                    <label>Location</label></br>
                    <select name="location" id="" v-on:change="onChangeSite($event)" v-model="location" class="location">
                        <option value="" disabled selected>Choose</option>
                        <option value="Polangui">Polangui</option>
                        <option value="Libon">Libon</option>
                        <option value="Oas">Oas</option>
                        <option value="Guinobatan">Guinobatan</option>
                        <option value="Ligao">Ligao</option>
                        <option value="Legazpi">Legazpi</option>
                        <option value="Camalig">Camalig</option>
                        <option value="Daraga">Daraga</option>
                    </select>
                    </br>
                    <div class="vehicle-container">
                        <label class="vehicle-label">Vehicle</label> </br>
                        <input type="radio" for="motorcycle" name="motorcycle" v-model="vehicle" class="motorcycle" value="Motorcycle">
                        <label for="motorcycle">Motorcycle</label>
                        <input type="radio" for="bicycle" name="bicycle" v-model="vehicle" class="bicycle" value="Bicycle">
                        <label for="bicycle">Bicycle</label>
                        <input type="radio" for="bicycle" name="runner" v-model="vehicle" class="runner" value="Runner">
                        <label for="runner">Runner</label>
                    </div>
                    
                    </br>
                    
                    <div class="license-container">
                        <input type="checkbox" id="license" v-model="license">
                        <label for="license">Does your Driver's License have Restriction 1 authorization</label>
                    </div>

                    <div class="model-container">
                        </br>
                        <label>Do you own a Motorcycle (2013 model and above)</label> </br>
                        <p>(for motorcycle owner only)</p>
                        <input type="radio" for="yes" name="yes" v-model="model" class="yes" value="Yes">
                        <label for="yes">Yes</label>
                        <input type="radio" for="borrower" name="borrowe" v-model="model" class="borrower" value="Borrower">
                        <label for="borrower">Borrower</label>
                        <input type="radio" for="second_owner" name="second_owner" v-model="model" class="second_owner" value="Second Owner">
                        <label for="second_owner">Second Owner</label>
                        <input type="radio" for="no" name="no" v-model="model" class="no" value="No">
                        <label for="no">No</label>
                        </br>
                        </div>



                    <div class="dual-form-container">
                        <div class="first_name_container">
                            <label>First Name</label> </br>
                            <input type="text" name="first_name" v-model="first_name" class="first_name">
                        </div>
                        </br>
                        <div class="last_name_container">
                            <label>Last Name</label> </br>
                            <input type="text" name="last_name" v-model="last_name" class="last_name">
                        </div>
                    </div>
                    </br>
                    <div class="number-email-container">
                        <label>Mobile Number</label></br>
                        <input type="text" name="mobile_number" v-model="mobile_number" class="mobile_number">
                        </br>
                        <label>Business Email</label></br>
                        <input type="text" name="business_email" v-model="business_email" class="business_email">
                        </br>
                    </div>
                    <label for="agree" class="agree"><input id="agree" class="agree" type="checkbox" value="agree" v-model="checked"/>By providing Atud with my personal data, I agree that Atud may collect, use and disclose
                        my personal data for purposes in accordance with its Privacy Policy.</label></br>
                    </br>
                    <label for="agree2" class="agree2"><input id="agree2" class="agree2" type="checkbox" value="agree2" v-model="checked2"/>I understand that my personal data may be used for marketing purposes by Atud or its 
                    partners; and I hereby consent to receive marketing and promotional materials by telephone, 
                    SMS or e-mail and through other channels as determined by Atud.</label></br>
                    </br>
                        <input type="button" :disabled="isDisabled" :style="isDisabledColor" onClick="document.location.href='success.php'" @click="createContact()" value="REGISTER" class="add">
                </form>
            </div>
            <div class="container-img">
                <img src="assets/paraatud_img.jpg" alt="Atud Para Tinda Pic">
            </div>
        </div>
    </div>

<script>
var app = new Vue({
  el: '#vueapp',
  data: {
      vehicle: '',
      model: '',
      location: '',
      first_name: '',
      mobile_number: '',
      last_name: '',
      email_address: '',
      license: false,
      checked: false,
      checked2: false,
      allData: []
  },
//   mounted: function () {
//     console.log('Hello from Vue!')
//     this.getContacts()
//   },
  computed: {
    isDisabled() {
        if (this.vehicle === '') {
            return true
        } else if (this.model === '') {
            return true
        } else if (this.location === '') {
            return true
        } else if (this.first_name === '') {
            return true
        } else if (this.mobile_number === '') {
            return true
        } else if (this.last_name === '') {
            return true
        } else if (this.email_address === '') {
            return true
        } else if (this.license === false) {
            return true
        } else if (this.checked === false) {
            return true
        } else if (this.checked2 === false) {
            return true
        } 
        else {
            return false
        }
    },
 
    isDisabledColor() {
        if (this.vehicle === '') {
            return 'gray'
        } else if (this.model === '') {
            return 'gray'
        } else if (this.location === '') {
            return 'gray'
        } else if (this.first_name === '') {
            return 'gray'
        } else if (this.mobile_number === '') {
            return 'gray'
        } else if (this.last_name === '') {
            return 'gray'
        } else if (this.email_address === '') {
            return 'gray'
        } else if (this.license === false) {
            return 'gray'
        } else if (this.checked === false) {
            return 'gray'
        } else if (this.checked2 === false) {
            return 'gray'
        } 
        else {
            return '#2DA81A'
        }
  },
  methods: {
    // getContacts: function(){
    //     axios.get('api/contacts.php')
    //     .then(function (response) {
    //         console.log(response.data);
    //         app.contacts = response.data;

    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
    // },
    onChange: function(e){
        var id = e.target.value;
        var name = e.target.options[e.target.options.selectedIndex].text;
        console.log('id ',id );
        console.log('name ',name );
    },

    createContact: function(){
        console.log("Create contact!")

        let formData = new FormData();
        console.log("location:", this.location)
        formData.append('location', this.location)
        formData.append('vehicle', this.vehicle)
        formData.append('motorcycle_model', this.model)
        formData.append('first_name', this.first_name)
        formData.append('last_name', this.last_name)
        formData.append('mobile_number', this.mobile_number)
        formData.append('email_address', this.email_address)
        formData.append('license', this.license)

        var allData = {};
        formData.forEach(function(value, key){
            allData[key] = value;
        });

        axios({
            method: 'post',
            url: 'api/paraatud.php',
            data: formData,
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then(function (response) {
            //handle success
            console.log(response)
            app.allData.push(contact)
        })
        .catch(function (response) {
            //handle error
            console.log(response)
        });
    },
  }
})    
</script>

</body>
  
</html>