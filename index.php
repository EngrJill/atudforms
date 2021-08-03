<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Be a Para-Tinda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
  
<body>
    <h1 class="h1aaaa">Para-Tinda Form</h1>
    <div id='vueapp'>

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
    <form>
        <h5 style="color: red" :style='{display: isRequired}'>All fields are required</h5>
      <label>Location</label>
      <select name="location" id="" v-on:change="onChangeSite($event)" v-model="location">
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
      <label>Business Name</label>
      <input type="text" name="business_name" v-model="business_name" class="business_name">
      </br>
      <label>Number of Branches/Outlets</label>
      <input type="number" name="number_branches" v-model="number_branches" class="number_branches">
      </br>
      <label>Business Address</label>
      <input type="text" name="business_address" v-model="business_address" class="business_address">
      </br>
      <label>Mobile Number</label>
      <input type="text" name="mobile_number" v-model="mobile_number" class="mobile_number">
      </br>
      <label>Business Email</label>
      <input type="text" name="business_email" v-model="business_email" class="business_email">
      </br>
      <label for="agree"><input id="agree" type="checkbox" value="agree" v-model="checked"/>I Agree</label>
      </br>
      <label for="agree2"><input id="agree2" type="checkbox" value="agree2" v-model="checked2"/>I Agree</label>
      </br>
    <input type="button" onClick="document.location.href='helloworld.php'" @click="createContact()" :disabled='isDisabled' value="Add" class="add">
    
    </form>

</div>

<script>
var app = new Vue({
  el: '#vueapp',
  data: {
      checked: false,
      checked2: false,
      location: '',
      business_name: '',
      number_branches: '',
      business_address: '',
      mobile_number: '',
      business_email: '',
      allData: []
  },
//   mounted: function () {
//     console.log('Hello from Vue!')
//     this.getContacts()
//   },
  computed: {
    isDisabled() {
        if (this.business_name === '') {
            return true
        } else if (this.number_branches === '') {
            return true
        } else if (this.location === '') {
            return true
        } else if (this.business_address === '') {
            return true
        } else if (this.mobile_number === '') {
            return true
        } else if (this.business_email === '') {
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
    isRequired() {
        if (this.business_name === '') {
            return 'block'
        } else if (this.number_branches === '') {
            return 'block'
        } else if (this.location === '') {
            return 'block'
        } else if (this.business_address === '') {
            return 'block'
        } else if (this.mobile_number === '') {
            return 'block'
        } else if (this.business_email === '') {
            return 'block'
        } else if (this.checked === false) {
            return 'block'
        } else if (this.checked2 === false) {
            return 'block'
        }
            else {
            return 'none'
        }
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
        formData.append('business_name', this.business_name)
        formData.append('number_branches', this.number_branches)
        formData.append('business_address', this.business_address)
        formData.append('mobile_number', this.mobile_number)
        formData.append('business_email', this.business_email)

        var allData = {};
        formData.forEach(function(value, key){
            allData[key] = value;
        });

        axios({
            method: 'post',
            url: 'api/paratinda.php',
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