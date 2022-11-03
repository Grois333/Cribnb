<template>
  <div>
    <h6 class="text-uppercase text-secondary font-weight-bolder">
      Check Availability
      <transition name="fade">
       <span v-if="noAvailability" class="text-danger">(NOT AVAILABLE)</span>
       <span v-if="hasAvailability" class="text-success">(AVAILABLE)</span>
      </transition>
    </h6>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="from">From</label>

        <date-pick 
          name="from"
          class="form-control form-control-sm"
          placeholder="Start date"
          v-model="from"
          @keyup.enter="check"
          :class="[{'is-invalid': errorFor('from')}]"
        >
        </date-pick>

        <!-- <input
          type="text"
          name="from"
          class="form-control form-control-sm"
          placeholder="Start date"
          v-model="from"
          @keyup.enter="check"
          :class="[{'is-invalid': errorFor('from')}]"
        /> -->

        <v-errors :errors="errorFor('from')"></v-errors>

        <!-- <div class="invalid-feedback" v-for="(error, index) in this.errorFor('from')" :key="'from' + index">{{error}}</div> -->

      </div>

      <div class="form-group col-md-6">
        <label for="to">To</label>

        <date-pick 
          type="text"
          name="to"
          class="form-control form-control-sm"
          placeholder="End date"
          v-model="to"
          @keyup.enter="check"
          :class="[{'is-invalid': errorFor('to')}]"
        >
        </date-pick>

        <!-- <input
          type="text"
          name="to"
          class="form-control form-control-sm"
          placeholder="End date"
          v-model="to"
          @keyup.enter="check"
          :class="[{'is-invalid': errorFor('to')}]"
        /> -->

          <v-errors :errors="errorFor('to')"></v-errors>

          <!-- <div class="invalid-feedback" v-for="(error, index) in this.errorFor('to')" :key="'to' + index">{{error}}</div> -->

      </div>
    </div>


    <button class="btn btn-secondary btn-block w-50 my-3" @click="check" :disabled="loading">
      <span v-if="!loading">Check!</span>
      <span v-if="loading">
        <i class="fas fa-circle-notch fa-spin"></i> Checking...
      </span>
    </button>


  </div>
</template>


<script>

import { is422 } from "./../shared/utils/response";
import validationErrors from "./../shared/mixins/validationErrors";

export default {
  mixins: [validationErrors],
  props: {
    bookableId: [String, Number]
  },
  data() {
    return {
      from: this.$store.state.lastSearch.from,
      to: this.$store.state.lastSearch.to,
      loading: false,
      status: null,
      //errors: null,
    };
  },
  methods: {

    async check(){
      //alert('Checking');
      this.loading = true;
      this.errors = null;

      //console.log(this.$store);

      //dispatch the action
      this.$store.dispatch('setLastSearch', {
        from: this.from,
        to: this.to
      });

      try{

        this.status = (await axios.get(
          `/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`
        )).status;

        this.$emit("availability", this.hasAvailability);

      } catch(err){

        if(is422(err)){
          this.errors = err.response.data.errors;
        }
        this.status = err.response.status;
        this.$emit("availability", this.hasAvailability);
      }

      this.loading = false;

      // //axios.get(`/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`
      // axios.get(`/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`
      // ).then(response => {
      //   this.status = response.status;
      // }).catch(error => {
      //   // if(422 === error.response.status){
      //   if(is422(error)){
      //     this.errors = error.response.data.errors;
      //   }
      //   this.status = error.response.status;
      // })
      // .then(()=> this.loading = false);
    },

    // errorFor(field){
    //   return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    // }

    // async check() {
    //   this.loading = true;
    //   this.errors = null;
    //   this.$store.dispatch("setLastSearch", {
    //     from: this.from,
    //     to: this.to
    //   });
    //   try {
    //     this.status = (await axios.get(
    //       `/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`
    //     )).status;
    //     this.$emit("availability", this.hasAvailability);
    //   } catch (err) {
    //     if (is422(err)) {
    //       this.errors = err.response.data.errors;
    //     }
    //     this.status = err.response.status;
    //     this.$emit("availability", this.hasAvailability);
    //   }
    //   this.loading = false;
    // }
  },
  computed: {
    hasErrors() {
      return 422 === this.status && this.errors !== null;
    },
    hasAvailability() {
      return 200 === this.status;
    },
    noAvailability() {
      return 404 === this.status;
    }
  }
};
</script>




<style>
  label {
    font-size: 0.7rem;
    text-transform: uppercase;
    color: gray;
    font-weight: bolder;
  }
  .is-invalid {
    border-color: #b22222;
    background-image: none;
  }
  .invalid-feedback {
    color: #b22222;
  }

  .vdpComponent{
    padding: 0;
    border: unset;
  }

.vdpComponent input{
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #212529;
  background-color: #f8fafc;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  min-height: calc(1.6em + 0.5rem + 2px);
  padding: 0.25rem 0.5rem;
  font-size: 0.7875rem;
  border-radius: 0.2rem;
}

</style>