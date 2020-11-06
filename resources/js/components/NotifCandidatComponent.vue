<template>
  <div class="container">
      <h4>Notifications</h4>

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <tbody>
                    <tr  v-for="item in notif" :key="item.id">
                        <td class="align-middle">
                            <div class="d-flex bd-highlight">
                                <div class=" flex-fill bd-highlight">
                                    <h5>{{item['recruteur']['employ_name']}} <span style="font-size:12px">(recruteur)</span> </h5>
                                </div>
                                <div class=" flex-fill bd-highlight">
                                    <p>{{item['date']}}</p>
                                </div>
                            </div>
                            {{item['val']['notif_message']}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
  </div>
</template>

<script>
export default {
    props:['notif']
}
</script>

<style>

</style>
