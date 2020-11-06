<template>
  <div class="container">
        <h4>Vos contracts en attente</h4>
      <div class="table-responsive mt-3">
          <table class="table table-bordered">
              <tbody>
                  <tr v-for="item in contrat" :key="item.id">
                        <td class="align-middle" >
                            L'employeur {{item['employ_name']}} vous propose un contract

                        </td>
                      <td class="align-middle">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-fill bd-highlight">
                                    <button class="btn btn-link">Confirmer</button>
                                </div>
                                <div class="p-2 flex-fill bd-highlight">
                                    <button class="btn btn-link">Annuler</button>
                                </div>
                                <div class="p-2 flex-fill bd-highlight">
                                    <button class="btn btn-link">Voir plus</button>
                                </div>
                            </div>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</template>

<script>
export default {
    props:['contrat']

}
</script>

<style>

</style>
