const state = {
  added: [],
  currentCoupon: {
      coupon: null,
      rulePassed: false,
      failedRule: null,
      disCountAmount: 0,
  },
  productDiscount: false,
  totalDiscount: false,
  freeShipping: false
}

const mutations = {
  ADD_TO_CART (state, productId) {
    const record = state.added.find(product => product.id === productId)

    if (!record) {
      state.added.push({
        id: productId,
        quantity: 1
      })
    } else {
      record.quantity++
    }
  },

  REMOVE_FROM_CART (state, item) {
    const index = state.added.findIndex(added => added.id === item.id)
    state.added.splice(index, 1)
  },

  TOGGLE_COUPON (state, coupon) {
    const coupons = {
      '1': 'productDiscount',
      '2': 'totalDiscount',
      '3': 'freeShipping'
    }

    if (coupons[coupon.id]) {
      state[coupons[coupon.id]] = !state[coupons[coupon.id]]
    }
  },

    SET_COUPON (state, coupon) {

      state.currentCoupon = coupon


  }
}

export default {
  state,
  mutations
}
