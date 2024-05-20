import { SliderComponent } from './component/slider';
import { TabsComponent } from './component/tabs';

export class Editor {
	init() {
		this.slider = new SliderComponent().init();
		this.tabs = new TabsComponent().init();
	}
}

new Editor().init();
