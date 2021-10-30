import Badge from "../components/Badge.vue";
import BaseAlert from "../components/BaseAlert.vue";
import BaseButton from "../components/BaseButton.vue";
import BaseCheckbox from "../components/BaseCheckbox.vue";
import BaseDropdown from "../components/BaseDropdown.vue";
import BaseHeader from "../components/BaseHeader.vue";
import BaseInput from "../components/BaseInput.vue";
import BaseNav from "../components/BaseNav.vue";
import BasePagination from "../components/BasePagination.vue";
import BaseProgress from "../components/BaseProgress.vue";
import BaseSwitch from "../components/BaseSwitch.vue";
import BaseRadio from "../components/BaseRadio.vue";
import BaseTable from "../components/BaseTable.vue";
import BaseSlider from "../components/BaseSlider.vue";
import Card from "../components/Card.vue";
import Modal from "../components/Modal.vue";
// import StatsCard from "../components/StatsCard";
import TabPane from "../components/Tabs/TabPane";
import Tabs from "../components/Tabs/Tabs";
import FormWizard from '../components/FormWizard.vue'
import TabContent from '../components/TabContent.vue'
import WizardButton from '../components/WizardButton.vue'
import WizardStep from '../components/WizardStep.vue'

import { ElTooltip, ElPopover } from "element-plus";

const GlobalComponents = {
  install(app) {
    app.component("badge", Badge);
    app.component("base-alert", BaseAlert);
    app.component("base-button", BaseButton);
    app.component("base-checkbox", BaseCheckbox);
    app.component("base-dropdown", BaseDropdown);
    app.component("base-header", BaseHeader);
    app.component("base-input", BaseInput);
    app.component("base-nav", BaseNav);
    app.component("base-pagination", BasePagination);
    app.component("base-progress", BaseProgress);
    app.component("base-switch", BaseSwitch);
    app.component("base-radio", BaseRadio);
    app.component("base-table", BaseTable);
    app.component("base-slider", BaseSlider);
    app.component("card", Card);
    app.component("modal", Modal);
    // app.component("stats-card", StatsCard);
    app.component("tab-pane", TabPane);
    app.component("tabs", Tabs);
    app.component('form-wizard', FormWizard)
    app.component('tab-content', TabContent)
    app.component('wizard-button', WizardButton)
    app.component('wizard-step', WizardStep)
    app.use(ElTooltip);
    app.use(ElPopover);
  },
};

export default GlobalComponents;
