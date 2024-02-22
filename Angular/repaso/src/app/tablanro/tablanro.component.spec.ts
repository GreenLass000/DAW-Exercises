import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TablanroComponent } from './tablanro.component';

describe('TablanroComponent', () => {
  let component: TablanroComponent;
  let fixture: ComponentFixture<TablanroComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TablanroComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(TablanroComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
