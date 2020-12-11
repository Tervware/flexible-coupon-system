<template>
  <ul class="list-group">
    <li class="list-group-item">
      Subtotal ({{itemsQuantity}} {{'item' | pluralize(itemsQuantity) }}): {{subtotal | formatMoney}}
    </li>



    <li class="list-group-item">Discount:

        <span v-if="currentCoupon.rulePassed">

        {{currentCoupon.discountAmount | formatMoney}}
             <br> <em v-if="currentCoupon.inputType === 'percent'"><b> ({{currentCoupon.inputValue}}% OFF applied)</b></em>
                    <em v-if="currentCoupon.inputType === 'number'"><b>{{currentCoupon.inputValue | formatMoney}} OFF</b></em>
    </span>

        <span v-else>
        {{currentCoupon.discountAmount | formatMoney}}
    </span>

    </li>

    <li class="list-group-item">
      <strong>Total:</strong>
      <span v-if="currentCoupon.discountAmount > 0">
      <strong> {{total - currentCoupon.discountAmount | formatMoney}}</strong>
      </span>
         <span v-else>
      <strong> {{total  | formatMoney}}</strong>
      </span>
    </li>
      <div v-if="itemsQuantity > 0" class="input-group my-3">
          <input type="text" class="form-control" v-model="coupon" placeholder="Enter the Coupon"  required>
          <div class="input-group-append">
              <button class="btn btn-outline-info" type="submit"  v-on:click="checkCoupon()">Apply </button>
          </div>
      </div>


          <span v-if="currentCoupon.rulePassed" class="text-success"> Coupon Applied </span>
          <span v-if="currentCoupon.failedRule" class="text-danger"> Coupon invalid/not Applicable </span>
  </ul>
</template>

<script>
import { mapGetters, mapState } from 'vuex'

export default {
  name: 'ShoppingCartSummary',
    data(){
      return {
          coupon: "MIXED10"
      }
    },
  computed: {
    ...mapGetters([
      'itemsQuantity',
      'subtotal',
      'taxes',
      'shipping',
      'total'
    ]),

    ...mapState({
        currentCoupon: state => state.shoppingCart.currentCoupon,
      productDiscount: state => state.shoppingCart.productDiscount,
      freeShipping: state => state.shoppingCart.freeShipping,
      totalDiscount: state => state.shoppingCart.totalDiscount
    }),
    totalWithDiscount () {
      let total = this.$store.getters.total
      return total > 0 ? this.total : 0
    }
  },
    methods: {
      checkCoupon () {
          this.currentCoupon.rulePassed = false;
          this.currentCoupon.failedRule = false;
       this.$store.dispatch("getCoupon", {coupon: this.coupon, numberOfItems: this.itemsQuantity, totalAmount: this.total});
    }
    }
}
</script>
