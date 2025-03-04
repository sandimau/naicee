<template slot="no-options">
    pilih data
</template>
<template slot="option" slot-scope="option">
    <div class="d-center">
        @{{ option.nama }}
    </div>
</template>
<template slot="selected-option" scope="option">
    <div class="selected d-center">
        @{{ option.nama }}
    </div>
</template>
