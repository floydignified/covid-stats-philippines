<template>
  <div class="w-100">
    <div>
      <b-card-group deck>
        <b-card
          bg-variant="light"
          header="Tested"
          class="text-center"
          :title="toLocale(data.tested)"
        >
          <b-spinner v-if="isLoading"></b-spinner>
        </b-card>

        <b-card
          bg-variant="secondary"
          text-variant="white"
          header="Infected"
          class="text-center"
          :title="toLocale(data.infected)"
        >
          <b-spinner v-if="isLoading"></b-spinner>
        </b-card>

        <b-card
          bg-variant="success"
          text-variant="white"
          header="Recovered"
          class="text-center"
          :title="toLocale(data.recovered)"
        >
          <b-spinner v-if="isLoading"></b-spinner>
          <b-card-text v-if="!isLoading">
            {{ recoveredPercentage.toFixed(4) }} %
          </b-card-text>
        </b-card>
        <b-card
          bg-variant="danger"
          text-variant="white"
          header="Deceased"
          class="text-center"
          :title="toLocale(data.deceased)"
        >
          <b-spinner v-if="isLoading"></b-spinner>
          <b-card-text v-if="!isLoading">
            {{ deceasedPercentage.toFixed(4) }} %
          </b-card-text>
        </b-card>
      </b-card-group>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    data: {
      type: Object,
      default: {}
    },
    isLoading: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    calculatePercentage(whole, percentage) {
      return (100 / whole) * percentage;
    },
    toLocale(number) {
      return number ? number.toLocaleString() : number;
    }
  },
  computed: {
    recoveredPercentage() {
      return this.calculatePercentage(this.data.infected, this.data.recovered);
    },
    deceasedPercentage() {
      return this.calculatePercentage(this.data.infected, this.data.deceased);
    }
  }
};
</script>
