import { TestBed } from '@angular/core/testing';

import { ServicioNotaService } from './servicio-nota.service';

describe('ServicioNotaService', () => {
  let service: ServicioNotaService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ServicioNotaService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
