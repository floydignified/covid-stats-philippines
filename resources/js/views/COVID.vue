<template>
  <b-container>
    <b-row class="text-center">
      <b-col>
        <Dashboard :data="covidData" :isLoading="isLoading" />
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import Dashboard from "../components/Dashboard";

export default {
  components: {
    Dashboard
  },
  data() {
    return {
      covidData: {},
      isLoading: false
    };
  },
  mounted() {
    this.fetchCovidData();
  },
  methods: {
    /**
     * Fetch list of covid data from backend
     */
    fetchCovidData() {
      this.isLoading = true;

      this.axios
        .get("/api/v1/covid")
        .then(response => {
          if (response.status === 200) {
            this.covidData = response.data.covid;
          }
          this.isLoading = false;
        })
        .catch(error => {
          this.isLoading = false;
        });
    }
  }
};
</script>

<style scoped>
@media (min-width: 1366px) {
  .container {
    max-width: 1250px;
  }
}

@media (min-width: 1600px) {
  .container {
    max-width: 1500px;
  }
}

@media (min-width: 1920px) {
  .container {
    max-width: 1800px;
  }
}
</style>
