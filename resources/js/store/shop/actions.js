import api from './../../api/fixtures'

export const getProfile = ({ commit }) => {
  api.getProfile(profile => {
    commit('RECEIVE_PROFILE', profile)
  })
}

export const getProducts = ({ commit }) => {
  api.getProducts(products => {
    commit('RECEIVE_PRODUCTS', products)
  })
}

export const getPromotions = ({ commit }) => {
  api.getPromotions(promotions => {
    commit('RECEIVE_PROMOTIONS', promotions)
  })
}

export const getCoupon = async ({ commit }, {coupon, numberOfItems, totalAmount}) => {

    const response = await axios.get(`/coupon/${coupon}`);

    const couponData = response.data;
      //check if coupon exists

    if(couponData.status === "error"){
        commit('SET_COUPON', {
            coupon,
            rulePassed: false,
            failedRule: couponData.message ,
            discountAmount: 0,
            totalAmount
        });
        return;
    } ;

    let isValidCoupon = true;
    //check rules
      couponData.data.rules.every(rule =>{
        if(rule.slug === "max_nondiscounted_amount"){
            if(rule.pivot.rule_value  >= totalAmount ){
                 isValidCoupon =  false,
                commit('SET_COUPON', {
                    coupon,
                    rulePassed: false,
                    failedRule: rule.name,
                    discountAmount: 0,
                    totalAmount
                });
                return false;
            }
        }

        if(rule.slug === "least_number_of_items"){
            if(rule.pivot.rule_value  > numberOfItems ){
                commit('SET_COUPON', {
                    coupon,
                    rulePassed: false,
                    failedRule: rule.name,
                    discountAmount: 0,
                    totalAmount
                });
                return false;
            }
        }

        return  true;

    })

    if (!isValidCoupon){
        return fasle;
    }
    let discountAmount = 0
    let inputType = null
    let inputValue = 0
    //Get discount amount from the discount types
    couponData.data.discount_types.forEach(discount =>{
        if(discount.inputType === "number"){
            const newDiscount = Number(discount.pivot.discount_value);
            if( newDiscount   >  discountAmount){
               discountAmount = newDiscount;
               inputType = "number";
               inputValue = discount.pivot.discount_value;
            }
        }

        if(discount.inputType === "percent"){
            const newDiscount = (Number(discount.pivot.discount_value)/100) * totalAmount;
             if( newDiscount   >  discountAmount){
               discountAmount = newDiscount;
               inputType = "percent";
               inputValue = discount.pivot.discount_value;
            }
        }

    })
       commit('SET_COUPON', {
            coupon,
            rulePassed: true,
            failedRule: null,
            discountAmount: discountAmount,
            inputType,
            inputValue,
            totalAmount: totalAmount + discountAmount,
        });

}


export const addToCart = ({ commit }, product) => {
  if (product.inventory > 0) {
    commit('ADD_TO_CART', product.id)
  }
}

export const removeFromCart = ({ commit }, product) => {
  commit('REMOVE_FROM_CART', product)
}

export const toggleCoupon = ({ commit }, coupon) => {
  commit('TOGGLE_COUPON', coupon)
}
