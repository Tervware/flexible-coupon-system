<template>
  <div>
    <h3>Cart</h3>

    <ShoppingCartItem
      v-for="item in items"
      :item="item"
      :key="item.id" />

    <ShoppingCartSummary />

    <div class="mt-3 text-center">

      <button class="btn btn- disabled"
              disabled
      >
        Checkout
      </button>

      <p v-if="orderOnLimit">Order is over limit.</p>
    </div>
  </div>
</template>

<script>
import ShoppingCartItem from './ShoppingCartItem'
import ShoppingCartSummary from './ShoppingCartSummary'
import { mapGetters } from 'vuex'

export default {
  name: 'ShoppingCart',
  computed: mapGetters({
    items: 'cartProducts',
    orderOnLimit: 'orderOnLimit'
  }),
  components: {
    ShoppingCartItem,
    ShoppingCartSummary
  },
  methods: {
    buy () {
      window.alert("You've bought it :)")
      window.location.reload()
    }
  }
}
</script>
