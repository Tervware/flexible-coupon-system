<template>
  <div>
    <PageHeader />

    <div class="container">

      <div class="row mt-5">
        <div class="col-sm-9">
          <ProductList />
        </div>

        <div class="col-sm-3">
          <ShoppingCart />
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import PageHeader from './../shared/PageHeader'
import Coupons from './Coupons'
import ProductList from './products/ProductList'
import ShoppingCart from './shopping-cart/ShoppingCart'

export default {
  name: 'Shop',
  components: {
    PageHeader,
    Coupons,
    ProductList,
    ShoppingCart
  }
}
</script>
